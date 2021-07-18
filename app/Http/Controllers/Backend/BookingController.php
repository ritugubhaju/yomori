<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\BookingRequest;
use App\Models\Booking\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = $this->booking->orderBy('created_at', 'desc')->get();

        return view('backend.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.booking.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        //
        if ($booking = $this->booking->create($request->data())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $booking);
            }
        }

        return redirect()->route('booking.index')->withSuccess(trans('New booking has been created'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //

        return view('backend.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        //
        if($booking->update($request->data())) {
            $booking->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $booking);
            }
            return redirect()->route('booking.index')->withSuccess(trans('booking has been updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $booking = $this->booking->find($id);
        $booking->delete();
        return redirect()->route('booking.index')->withSuccess(trans('booking has been deleted'));
    }

    function uploadFile(Request $request, $booking)
    {
        $file = $request->file('image');
        $path = 'uploads/booking';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($booking->image))
            $this->__deleteImages($booking);

        $data['image'] = $fileName;
        $this->updateImage($booking->id, $data);

    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {

        }
    }

    public function updateImage($bookingId, array $data)
    {
        try {
            $booking = $this->booking->find($bookingId);
            $booking = $booking->update($data);
            return $booking;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
