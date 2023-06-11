@extends('admin.layout.app')

@section('title', 'Datewise Room')


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
                    <li class="breadcrumb-item active text-info">Datewise Room</li>
                </ol>
            </div>
        </div>


    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
        <div class="card mb-4">
            <div class="p-2">
                <a class="btn btn-warning" href="{{ route('admin_datewise_rooms_submit') }}">Detail</a>
            </div>

            <div class="card-body">
            <form action="{{ route('admin_datewise_rooms_submit') }}" method="POST">
                @csrf
                {{-- @method('post') --}}
                <div class="mb-3 row">
                    <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="selected_date" value="YYYY-MM-DD" id="html5-date-input" />
                        </div>
                </div>


                <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
