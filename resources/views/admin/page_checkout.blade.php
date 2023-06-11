@extends('admin.layout.app')

@section('title', 'Checkout Page')


@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Checkout Page</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">Checkout Page</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_page_checkout_update') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Checkout Heading</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-text"></i>
                            </span>
                            <input
                                type="text"
                                name="checkout_heading"
                                class="form-control @error('checkout_heading') is-invalid @enderror"
                                id="checkout_heading"
                                placeholder="Checkout"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ $page_data->checkout_heading }}"
                            />
                        </div>
                        @error('checkout_heading')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Satus</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <select name="checkout_status" class="form-control" id="">
                                <option value="1"  @if($page_data->checkout_status == 1) selected  @endif>Show</option>
                                <option value="0" @if($page_data->checkout_status == 0) selected  @endif>Hide</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- / Content -->

</div>

@endsection
