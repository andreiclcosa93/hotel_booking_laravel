@extends('admin.layout.app')

@section('title', 'Feature Add')

@section('main_content')



<div class="content-wrapper">


    <div class="container-xxl flex-grow-1 container">


        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Feature Add</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_feature_view') }}">Feature View</a></li>
                    <li class="breadcrumb-item active text-info">Feature Add</li>
                </ol>
            </div>
        </div>


    <div class="row">

        <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-body">
            <form action="{{ route('admin_feature_store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Icon</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                <i class="bx bx-text"></i>
                            </span>
                            <input
                                type="text"
                                name="icon"
                                class="form-control @error('icon') is-invalid @enderror"
                                id="image"
                                placeholder="icon"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                        @error('icon')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                                value="{{ old('heading') }}"
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
                            >{{ old('text') }}</textarea>
                        </div>
                        @error('text')
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


</div>


@endsection
