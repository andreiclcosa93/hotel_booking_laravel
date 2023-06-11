@extends('admin.layout.app')

@section('title', 'My Profile')

@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">

        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">My Profile</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">My Profile</li>
                </ol>
            </div>
        </div>

            <div class="row">

                <div class="col-xxl">

                    <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>

                        <div class="card-body">
                            <form action="{{ route('admin_profile_submit') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                                            <img
                                                {{-- src="{{ asset('../admin/assets/img/avatars/6.png') }}" --}}
                                                src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}"
                                                alt="user-avatar"
                                                class="d-block rounded"
                                                height="100"
                                                width="100"
                                                id="showImage"
                                            />

                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text">
                                                    <i class="bx bx-user"></i>
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
                                        </div>

                                    </div>

                                    <hr class="my-0" />

                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firstName"
                                            name="name"
                                            value="{{ Auth::guard('admin')->user()->name }}"
                                        />
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="email"
                                            name="email"
                                            value="{{ Auth::guard('admin')->user()->email }}"
                                            placeholder="john.doe@example.com"
                                        />
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            class="form-control"
                                            placeholder="Password"
                                        />
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="retype_password">Password Confirmation</label>
                                        <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            id="retype_password"
                                            name="retype_password"
                                            class="form-control"
                                            placeholder="Password Confirmation"
                                        />
                                        </div>
                                    </div>


                                </div>

                                <div class="mt-2">

                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>

                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>

    </div>


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

