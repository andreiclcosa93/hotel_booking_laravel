@extends('admin.layout.app')

@section('title', 'Slide Edit')


@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Slide Edit</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_slide_view') }}">Slide View</a></li>
                    <li class="breadcrumb-item active text-info">Slide Edit</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_slide_update', $slide_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Photo</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-photo-album"></i>
                            </span>
                            <input
                                type="file"
                                name="photo"
                                class="form-control @error('photo') is-invalid @enderror"
                                id="image"
                                placeholder="photo"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname"></label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <img src="{{ asset('uploads/'.$slide_data->photo) }}"  name="photo" id="showImage" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Heading</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text">
                            <i class="bx bx-text"></i>
                        </span>
                            <input
                                type="text"
                                name="heading"
                                id="basic-icon-default-company"
                                class="form-control @error('heading') is-invalid @enderror"
                                placeholder="Heading"
                                value="{{ $slide_data->heading }}"
                                aria-describedby="basic-icon-default-company2"
                            />
                        </div>
                        @error('heading')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Text</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <textarea
                                type="text"
                                name="text"
                                id="basic-icon-default-company"
                                class="form-control @error('text') is-invalid @enderror"
                                cols="20"
                                rows="6"
                            >{{ $slide_data->text }}</textarea>
                        </div>
                        @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Button Text</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="button_text"
                                id="basic-icon-default-phone"
                                class="form-control @error('button_text') is-invalid @enderror"
                                placeholder="Button Text"
                                value="{{ $slide_data->button_text }}"
                            />
                        </div>
                        @error('button_text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Button Url</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="button_url"
                                id="basic-icon-default-phone"
                                class="form-control @error('button_url') is-invalid @enderror"
                                placeholder="Button Url"
                                value="{{ $slide_data->button_url }}"
                            />
                        </div>
                        @error('button_url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload =  function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
