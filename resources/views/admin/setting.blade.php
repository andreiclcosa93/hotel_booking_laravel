@extends('admin.layout.app')

@section('title', 'Settings')


@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-b">
            <h4>Settings</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">Settings</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_setting_update', $setting_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-sm-6 col-form-label" for="basic-icon-default-fullname">Logo</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="file"
                                name="logo"
                                class="form-control @error('logo') is-invalid @enderror"
                                id="image"
                                placeholder="Logo"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-3 mt-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname"></label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <img src="{{ asset('uploads/'.$setting_data->logo) }}" style="width:90px" name="logo" id="showImage" class=" avatar-lg img-thumbnail"
                                    alt="profile-image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-sm-6 col-form-label" for="basic-icon-default-fullname">Favicon</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="file"
                                name="favicon"
                                class="form-control @error('favicon') is-invalid @enderror"
                                id="imageSec"
                                placeholder="Favicon"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        @error('favicon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row mb-3 mt-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname"></label>
                            <div class="col-sm-5">
                                <div class="input-group input-group-merge">
                                    <img src="{{ asset('uploads/'.$setting_data->favicon) }}" style="width:90px" name="favicon" id="showImageSec" class=" avatar-lg img-thumbnail"
                                    alt="profile-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="top_bar_phone" class="form-label">Top Bar Phone</label>
                        <input
                            class="form-control"
                            type="text"
                            id="top_bar_phone"
                            name="top_bar_phone"
                            value="{{ $setting_data->top_bar_phone }}"
                        />
                    </div>
                    @error('top_bar_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 col-md-6">
                        <label for="top_bar_email" class="form-label">Top Bar E-mail</label>
                        <input
                            class="form-control"
                            type="text"
                            id="top_bar_email"
                            name="top_bar_email"
                            value="{{ $setting_data->top_bar_email }}"
                            placeholder="john.doe@example.com"
                        />
                    </div>
                    @error('top_bar_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label class="col-sm-6 col-form-label" for="basic-icon-default-email">Home Feature Status</label>
                        <div class="input-group input-group-merge">
                            <select name="home_feature_status" class="form-control" id="">
                                <option value="Show" @if($setting_data->home_feature_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($setting_data->home_feature_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label class="col-sm-6 form-label" for="basic-icon-default-phone">Total Rooms</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="home_room_total"
                                id="basic-icon-default-phone"
                                class="form-control @error('home_room_total') is-invalid @enderror"
                                placeholder="Total Rooms"
                                value="{{ $setting_data->home_room_total  }}"
                            />
                        </div>
                        @error('home_room_total')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label class="col-sm-6 col-form-label" for="home_room_status">Home Room Status</label>
                        <div class="input-group input-group-merge">
                            <select name="home_room_status" class="form-control" id="">
                                <option value="Show" @if($setting_data->home_room_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($setting_data->home_room_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-sm-6 col-form-label" for="home_feature_status">Home Testimonial Status</label>
                        <div class="input-group input-group-merge">
                            <select name="home_feature_status" class="form-control" id="">
                                <option value="Show" @if($setting_data->home_testimonial_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($setting_data->home_testimonial_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="home_latest_post_total" class="col-form-label">Home Latest Post Total</label>
                        <input
                            class="form-control"
                            type="text"
                            id="home_latest_post_total"
                            name="home_latest_post_total"
                            value="{{ $setting_data->home_latest_post_total }}"
                        />
                        @error('home_latest_post_total')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="col-sm-6 col-form-label" for="basic-icon-default-email">Home Latest Post Status</label>
                        <div class="input-group input-group-merge">
                            <select name="home_latest_post_status" class="form-control" id="">
                                <option value="Show" @if($setting_data->home_latest_post_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($setting_data->home_latest_post_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Footer Address</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">

                            <textarea
                                type="text"
                                name="footer_address"
                                id="editor1"
                                class="form-control @error('footer_address') is-invalid @enderror"
                                cols="20"
                                rows="2"
                            >{{ $setting_data->footer_address }}</textarea>
                        </div>
                        @error('footer_address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="footer_phone" class="form-label">Footer Phone</label>
                        <input
                            class="form-control"
                            type="text"
                            id="footer_phone"
                            name="footer_phone"
                            value="{{ $setting_data->footer_phone }}"
                        />
                    </div>
                        @error('footer_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    <div class="mb-3 col-md-6">
                        <label for="footer_email" class="form-label">Footer E-mail</label>
                        <input
                            class="form-control"
                            type="text"
                            id="footer_email"
                            name="footer_email"
                            value="{{ $setting_data->footer_email }}"
                            placeholder="john.doe@example.com"
                        />
                    </div>
                        @error('footer_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="copyright" class="form-label">Copyright Text</label>
                        <input
                            class="form-control"
                            type="text"
                            id="copyright"
                            name="copyright"
                            value="{{ $setting_data->copyright }}"
                        />
                    </div>
                    @error('copyright')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 col-md-6">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input
                            class="form-control"
                            type="text"
                            id="facebook"
                            name="facebook"
                            value="{{ $setting_data->facebook }}"
                        />
                    </div>
                    @error('facebook')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input
                            class="form-control"
                            type="text"
                            id="twitter"
                            name="twitter"
                            value="{{ $setting_data->twitter }}"
                        />
                    </div>
                    @error('twitter')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 col-md-6">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input
                            class="form-control"
                            type="text"
                            id="linkedin"
                            name="linkedin"
                            value="{{ $setting_data->linkedin }}"
                        />
                    </div>
                    @error('linkedin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="pinterest" class="form-label">Pinterest</label>
                        <input
                            class="form-control"
                            type="text"
                            id="pinterest"
                            name="pinterest"
                            value="{{ $setting_data->pinterest }}"
                        />
                    </div>
                    @error('pinterest')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 col-md-6">
                        <label for="analytic_id" class="form-label">Google</label>
                        <input
                            class="form-control"
                            type="text"
                            id="analytic_id"
                            name="analytic_id"
                            value="{{ $setting_data->analytic_id }}"
                        />
                    </div>
                    @error('analytic_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="theme_color_1" class="form-label">Theme Color 1</label>
                        <input
                            class="form-control"
                            type="text"
                            id="theme_color_1"
                            name="theme_color_1"
                            value="{{ $setting_data->theme_color_1 }}"
                        />
                    </div>
                    @error('theme_color_1')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="mb-3 col-md-6">
                        <label for="theme_color_2" class="form-label">Theme Color 2</label>
                        <input
                            class="form-control"
                            type="text"
                            id="theme_color_2"
                            name="theme_color_2"
                            value="{{ $setting_data->theme_color_2 }}"
                        />
                    </div>
                    @error('theme_color_2')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
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

    $(document).ready(function(){
        $('#imageSec').change(function(e){
            var reader2 = new FileReader();
            reader2.onload =  function(e){
                $('#showImageSec').attr('src',e.target.result);
            }
            reader2.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
