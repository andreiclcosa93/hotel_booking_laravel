@extends('front.layout.app')


@section('main_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            @foreach ($page_data as $item)
                <div class="col-md-12">
                    <h2>{{ $item->terms_heading }}</h2>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            @foreach ($page_data as $item)
                <div class="col-md-12">
                    <p>{!! $item->terms_content !!}</p>
                </div>
            @endforeach

        </div>

    </div>
</div>

@endsection
