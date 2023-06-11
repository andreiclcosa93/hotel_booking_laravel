@extends('admin.layout.app')

@section('title', 'Add Room')

@section('main_content')

<style>
    .card {
        box-shadow: 0 0 11px rgba(10,10,10,.8);
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Slide Add</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_rooms_show') }}">Room View</a></li>
                    <li class="breadcrumb-item active text-info">Add Room</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_room_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-sm-6 col-form-label" for="basic-icon-default-fullname">Photo</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-photo-album"></i>
                            </span>
                            <input
                                type="file"
                                name="featured_photo"
                                class="form-control @error('featured_photo') is-invalid @enderror"
                                id="image"
                                placeholder="featured_photo"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        @error('featured_photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label class="col-sm-6 col-form-label" for="basic-icon-default-fullname"></label>
                                <div class="input-group input-group-merge">
                                    <img src="{{ asset('uploads/no_image.jpg') }}"  name="photo" id="showImage" class="rounded-circle avatar-lg img-thumbnail"
                                    alt="profile-image">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <label class="col-sm-6 col-form-label" for="basic-icon-default-company">Name</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text">
                            <i class="bx bx-text"></i>
                        </span>
                            <input
                                type="text"
                                name="name"
                                id="basic-icon-default-company"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Name"
                                value="{{ old('name') }}"
                                aria-describedby="basic-icon-default-company2"
                            />
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Description</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <textarea
                                type="text"
                                name="description"
                                id="editor1"
                                class="form-control @error('description') is-invalid @enderror"
                                cols="20"
                                rows="6"
                            >{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-sm-6 form-label" for="basic-icon-default-phone">Price</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="price"
                                id="basic-icon-default-phone"
                                class="form-control @error('price') is-invalid @enderror"
                                placeholder="Button Text"
                                value="{{ old('price') }}"
                            />
                        </div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="col-sm-6 form-label" for="basic-icon-default-phone">Total Rooms</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="total_rooms"
                                id="basic-icon-default-phone"
                                class="form-control @error('total_rooms') is-invalid @enderror"
                                placeholder="Total Rooms"
                                value="{{ old('total_rooms') }}"
                            />
                        </div>
                        @error('total_rooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-md-6 form-label" for="basic-icon-default-phone">Room Size</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="size"
                                id="basic-icon-default-phone"
                                class="form-control @error('size') is-invalid @enderror"
                                placeholder="Room Size"
                                value="{{ old('size') }}"
                            />
                        </div>
                        @error('size')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-6 form-label" for="basic-icon-default-phone">Bedss</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="total_beds"
                                id="basic-icon-default-phone"
                                class="form-control @error('total_beds') is-invalid @enderror"
                                placeholder="Total Beeds"
                                value="{{ old('total_beds') }}"
                            />
                        </div>
                        @error('total_beds')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-sm-6 form-label" for="basic-icon-default-phone">Bathrooms</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="total_bathrooms"
                                id="basic-icon-default-phone"
                                class="form-control @error('total_bathrooms') is-invalid @enderror"
                                placeholder="Bathrooms"
                                value="{{ old('total_bathrooms') }}"
                            />
                        </div>
                        @error('total_bathrooms')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="col-sm-6 form-label" for="basic-icon-default-phone">Balconies</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="total_balconies"
                                id="basic-icon-default-phone"
                                class="form-control @error('total_balconies') is-invalid @enderror"
                                placeholder="Balconies"
                                value="{{ old('total_balconies') }}"
                            />
                        </div>
                        @error('total_balconies')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-sm-6 form-label" for="basic-icon-default-phone">Guests</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="total_guests"
                                id="basic-icon-default-phone"
                                class="form-control @error('total_guests') is-invalid @enderror"
                                placeholder="Guests"
                                value="{{ old('total_guests') }}"
                            />
                        </div>
                        @error('total_guests')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="col-sm-6 form-label" for="basic-icon-default-phone">Video</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <i class="bx bx-comment"></i>
                            </span>
                            <input
                                type="text"
                                name="video_id"
                                id="basic-icon-default-phone"
                                class="form-control @error('video_id') is-invalid @enderror"
                                placeholder="Video"
                                value="{{ old('video_id') }}"
                            />
                        </div>
                        @error('video_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl">
                        <div class="card mb-4" style="max-width: 600px">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Name Amenities</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @php $i = 0; @endphp

                                    @forelse ($all_amenities as $item)

                                        @php $i++; @endphp
                                        <tr class="text-start">
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="input-group input-group-merge">
                                                            <input
                                                                class="form-check-input"
                                                                name="arr_amenities[]"
                                                                type="checkbox"
                                                                value="{{ $item->id }}"
                                                                id="defaultCheck{{ $i }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <label class="col-sm-5 form-check-label" for="defaultCheck{{ $i }}">{{ $item->name }}</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                            <div class="alert alert-warning text-center">
                                                There is no data recorded in the table
                                            </div>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
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
    <!-- / Content -->

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
