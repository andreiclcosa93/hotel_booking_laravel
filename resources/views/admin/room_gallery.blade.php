@extends('admin.layout.app')

@section('title', 'Gallery Photo')


@section('main_content')

<style>
    .gallery-photo {
        opacity: 0.5;
    }

    .gallery-photo:hover {
        opacity: 1;
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Room Gallery of  <span class="text-info">{{ $room_data->name }}</span> </h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_rooms_show') }}">Room View</a></li>
                    <li class="breadcrumb-item active text-info">Gallery Photo</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_room_gallery_update',$room_data->id) }}" method="POST" enctype="multipart/form-data">
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
                                placeholder="Photo"
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
                            <img src="{{ asset('uploads/no_image.jpg') }}"  name="photo" id="showImage" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">
                        </div>
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

</div>

    <hr>
    <div class="d-flex justify-content-center">
        <h3>Gallery Photo</h3>
    </div>

    <div class="row mb-5">
        @foreach ($room_photos as $item)
            <div class="col-md-6 col-xl-4 px-4 mb-5">
                <div class="card  border-0 p-3">
                    <img class="card-img" src="{{ asset('uploads/'.$item->photo) }}" alt="Card image" />
                        <div class="card-img-overlay">
                            <h5 class="card-title"></h5>
                            <a class="btn btn-danger gallery-photo" href="{{ route('admin_room_gallery_delete', $item->id) }}"><i class="bx bx-trash me-1"></i> </a>
                        </div>
                </div>
            </div>
        @endforeach
    </div>

<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>


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
