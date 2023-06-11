@extends('admin.layout.app')

@section('title', 'Amenity Add')


@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-bFAQs Add</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_amenities_show') }}">Amenity View</a></li>
                    <li class="breadcrumb-item active text-info">Amenity Add</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_amenity_store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-text"></i>
                            </span>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                placeholder="name"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add</button>
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

<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>

@endsection
