@extends('admin.layout.app')

@section('title', 'View Datewise Room (')

{{-- @section('heading', 'Slide') --}}

@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">

        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">View Datewise Room (Booked and Available) for {{ $selected_date }}</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin_datewise_rooms') }}">Datewise Room</a></li>
                    <li class="breadcrumb-item active text-info">View Datewise Room (Booked and Available)</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <!-- Basic with Icons -->
            <div class="col-xxl">

                    <div class="card">

                        <div class="table-responsive text-nowrap">
                        <table class="table table-dark">
                            <thead>
                                <tr class="text-center">
                                    <th>SL</th>
                                    <th>Room Name</th>
                                    <th>Total Rooms</th>
                                    <th>Booked Rooms</th>
                                    <th>Available Rooms</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $rooms = \App\Models\Room::get();
                                @endphp
                                @forelse($rooms as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->total_rooms }}</td>
                                        <td>
                                            @php
                                            $cnt = \App\Models\BookedRoom::where('room_id',$row->id)->where('booking_date',$selected_date)->count();
                                            @endphp
                                            {{ $cnt }}
                                        </td>
                                        <td>
                                            {{ $row->total_rooms-$cnt }}
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
