@extends('admin.layout.app')

@section('title', 'Post Edit')


@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Post Edit</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_post_view') }}">Post View</a></li>
                    <li class="breadcrumb-item active text-info">Post Edit</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
                <form action="{{ route('admin_post_update', $slide_data->id) }}" method="POST" enctype="multipart/form-data">
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
                                <img src="{{ asset('uploads/'.$slide_data->photo) }}" name="photo" id="showImage" class="rounded-circle avatar-lg img-thumbnail"
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
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Short Content</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <textarea
                                    type="text"
                                    name="short_content"
                                    id="basic-icon-default-company"
                                    class="form-control @error('short_content') is-invalid @enderror"
                                    cols="20"
                                    rows="3"
                                >{{ $slide_data->short_content }}</textarea>
                            </div>
                            @error('short_content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Content</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea
                                    type="text"
                                    name="content"
                                    id="editor1"
                                    class="form-control @error('content') is-invalid @enderror"
                                    cols="20"
                                    rows="5"
                                >{{ $slide_data->content }}</textarea>
                            </div>
                            @error('content')
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


{{-- ########################################### --}}
{{-- install pack ckeditor  --}}

<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>


{{-- ens of install pack ckeditor  --}}
{{-- ########################################### --}}

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
