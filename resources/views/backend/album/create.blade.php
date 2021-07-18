@extends('backend.layouts.admin.admin')

@section('title', 'photo')

@section('content')
    <section>
        <div class="section-body">

            {{ Form::open(['route' =>'album.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.album.partials.form', ['header' => 'Create a Album'])
            {{ Form::close() }}
        </div>
    </section>
@stop

@push('styles')
    <link rel="stylesheet"href="{{ asset('backend/assets/css/dropify.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/libs/dropify/dropify.min.js') }}"></script>
@endpush
