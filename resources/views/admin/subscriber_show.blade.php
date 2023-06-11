@extends('admin.layout.app')

@section('title', 'Subscriber')

{{-- @section('heading', 'Slide') --}}


@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">

        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Subscriber View</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">Subscriber View</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <!-- Basic with Icons -->
            <div class="col-xxl">
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr class="text-center">
                                    <th>SL</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($all_subscribers as $row)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->status }}</td>
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
