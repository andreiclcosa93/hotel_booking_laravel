@extends('admin.layout.app')

@section('title', 'Send Email')


@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Send Email to Subscribers</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">Send Email to Subscribers</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_subscriber_send_email_submit') }}" method="POST">
                @csrf
                @method('post')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Subject</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-text"></i>
                            </span>
                            <input
                                type="text"
                                name="subject"
                                class="form-control @error('subject') is-invalid @enderror"
                                id="subject"
                                placeholder="subject"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Message</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-company2" class="input-group-text">
                            <i class="bx bx-text"></i>
                        </span>
                            <textarea
                                type="text"
                                name="message"
                                id="basic-icon-default-company"
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="Message"
                                value="{{ old('message') }}"
                                rows="6"
                                aria-describedby="basic-icon-default-company2"
                            ></textarea>
                        </div>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send Email</button>
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
