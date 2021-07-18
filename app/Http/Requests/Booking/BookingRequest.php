<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   
    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'fullname' => $this->get('fullname'),
            'email'  => $this->get('email'),
            'subject'  => $this->get('subject'),
            'message'  => $this->get('message'),
        ];
        return $data;

    }
}
