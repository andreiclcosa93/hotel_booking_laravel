@extends('customer.layout.app')


@section('title', 'Dashboard-Customer')


{{-- @section('heading', 'Dashboard-Customer') --}}


@section('main_content')


    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <h2>Wellcome: <span style="color: #696CFF; "> {{ auth()->user()->name }}</span> </h2>
    </div>


@endsection
