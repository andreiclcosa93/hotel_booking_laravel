@extends('admin.layout.app')

@section('title', 'Orders')

@section('main_content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container">

        <div class="col-12" style="margin-top:-35px;">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                <h4 class="mb-sm-0">Orderss</h4>
            </div>
            <div class="page-title-right mb-2">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active text-info">Orders</li>
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
                                <th>Order No</th>
                                <th>Payment Method</th>
                                <th>Booking Date</th>
                                <th>Paid Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($orders as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->order_no }}</td>
                                        <td>{{ $row->payment_method }}</td>
                                        <td>{{ $row->booking_date }}</td>
                                        <td>{{ $row->paid_amount }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_invoice',$row->id) }}" class="btn btn-primary">Detail Inv.</a>
                                            <a href="{{ route('admin_order_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
