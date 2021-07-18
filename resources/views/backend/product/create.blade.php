@extends('backend.layouts.admin.admin')

@section('title', 'Product')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('backend.product.partials.form',['header' => 'Create a Product'])
            </form>
        </div>
    </section>
@stop


