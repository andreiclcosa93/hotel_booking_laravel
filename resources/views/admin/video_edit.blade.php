@extends('admin.layout.app')

@section('title', 'Video Gallery Edit')


@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Video Gallery Add</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_video_view') }}">Video Gallery View</a></li>
                    <li class="breadcrumb-item active text-info">Video Gallery  Edit</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_video_update', $video_data->id) }}" method="POST">
                @csrf

                <div class="row mb-5">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Video</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge mb-4">
                            <iframe width="390" height="250" src="https://www.youtube.com/embed/{{ $video_data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Video</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-photo-album"></i>
                            </span>
                            <input
                                type="text"
                                name="video_id"
                                class="form-control @error('video_id') is-invalid @enderror"
                                id="video"
                                placeholder="Video"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ $video_data->video_id }}"
                            />
                        </div>
                        @error('video_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Caption</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <textarea
                                type="text"
                                name="caption"
                                id="basic-icon-default-company"
                                class="form-control @error('caption') is-invalid @enderror"
                                cols="20"
                                rows="3"
                            >{{ $video_data->caption }}</textarea>
                        </div>
                        @error('caption')
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

@endsection
