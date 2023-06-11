@extends('admin.layout.app')

@section('title', 'Slide')

{{-- @section('heading', 'Slide') --}}

@section('right_top_button')
<a href="{{ route('admin_slide_add') }}" type="button" class="btn btn-primary">Add</a>
@endsection

@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">

        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Slide View</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">Slide View</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <!-- Basic with Icons -->
            <div class="col-xxl">

                    <div class="card">

                            <div class="demo-inline-spacing d-flex justify-content-end mb-4">
                                @yield('right_top_button')
                            </div>

                        <div class="table-responsive text-nowrap">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Heading</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($slides as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="" style="width: 80px">
                                        </td>
                                        <td>{{ $row->heading }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('admin_slide_edit', $row->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="btn btn-danger" href="{{ route('admin_slide_delete', $row->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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
    </div>

</div>


@endsection
