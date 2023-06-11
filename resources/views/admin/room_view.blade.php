@extends('admin.layout.app')

@section('title', 'View Rooms')

{{-- @section('heading', 'Slide') --}}

@section('right_top_button')
<a href="{{ route('admin_room_add') }}" type="button" class="btn btn-primary">Add</a>
@endsection

@section('main_content')


<style>

    @media only screen and (max-width: 440px) {
        iframe {
            max-width: 100%;
            height: 100%;
        }
    }

</style>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">

        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">View Rooms</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">View Rooms</li>
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
                                <th>Name</th>
                                <th>Price (per night)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php $i=0; @endphp
                                @forelse ($rooms as $row)
                                    @php $i++; @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$row->featured_photo) }}" alt="" style="width: 80px">
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>${{ $row->price }}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('admin_room_gallery', $row->id) }}">Gallery</a>
                                            <a class="btn btn-warning" href="{{ route('admin_room_edit', $row->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="btn btn-danger" href="{{ route('admin_room_delete', $row->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $i }}">
                                                Details
                                            </button>
                                        </td>
                                    </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title mx-auto" id="exampleModalLabel" style="color: #696CFF;">{{ $row->name }}</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" style="background: #f2fcfe;">
                                                        {{-- {!! $row->description !!} --}}
                                                        <hr>
                                                            <iframe max-width="290" height="210" src="https://www.youtube.com/embed/{{ $row->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="form-label"> <span style="color: #696CFF;">Price:</span>  ${{ $row->price }} </label>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="form-label"> <span style="color: #696CFF;">Total Rooms:</span>  {{ $row->total_rooms }} </label>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="form-label"> <span style="color: #696CFF;">Total Beds:</span>  {{ $row->total_beds }} </label>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label for="form-label"> <span style="color: #696CFF;">Amenities:</span>
                                                                    </label>
                                                                </div>
                                                                    @php
                                                                        $arr = explode(',',$row->amenities);

                                                                        for($j=0; $j<count($arr); $j++) {
                                                                            $temp_row = \App\Models\Amenity::where('id',$arr[$j])->first();
                                                                            echo $temp_row->name . '<br>';
                                                                        }
                                                                    @endphp
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
