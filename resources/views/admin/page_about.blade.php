@extends('admin.layout.app')

@section('title', 'Edit About Page')


@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Edit About Page</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">Edit About Page</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_page_about_update') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Heading</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-text"></i>
                            </span>
                            <input
                                type="text"
                                name="about_heading"
                                class="form-control @error('about_heading') is-invalid @enderror"
                                id="video"
                                placeholder="Video"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ $page_data->about_heading }}"
                            />
                        </div>
                        @error('about_heading')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Content</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <textarea
                                type="text"
                                name="about_content"
                                id="editor1"
                                class="form-control @error('about_content') is-invalid @enderror"
                                cols="20"
                                rows="3"
                            >{{ $page_data->about_content }}</textarea>
                        </div>
                        @error('about_content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Satus</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <select name="about_status" class="form-control" id="">
                                <option value="1"  @if($page_data->about_status == 1) selected  @endif>Show</option>
                                <option value="0" @if($page_data->about_status == 0) selected  @endif>hide</option>
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

<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>

@endsection
