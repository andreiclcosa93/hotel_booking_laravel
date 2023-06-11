@extends('admin.layout.app')


@section('title', 'Dashboard')


@section('heading', 'Dashboard')


@section('main_content')

    <!-- Total Revenue -->
    <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <div class="row row-bordered g-0">
                <div class="col-md-4">
                    <h4 class="card-header m-0 me-2 pb-3"><span> <i class="bx bx-wallet text-info"></i> </span> Completed Orders - <span style="color: #696CFF;">{{ $total_completed_orders }}</span> </h4>
                    <h4 class="card-header m-0 me-2 pb-3"><span> <i class="bx bx-wallet text-info"></i> </span> Pending Orders - <span style="color: #696CFF;">{{ $total_pending_orders }}</span> </h4>
                    <h4 class="card-header m-0 me-2 pb-3"><span> <i class="bx bx-user text-info"></i> </span> Active Customers - <span style="color: #696CFF;">{{ $total_active_customers }}</span> </h4>
                    <h4 class="card-header m-0 me-2 pb-3"><span> <i class="bx bx-user text-info"></i> </span> Pending Customers - <span style="color: #696CFF;">{{ $total_pending_customers }}</span> </h4>
                    <h4 class="card-header m-0 me-2 pb-3"><span> <i class="bx bx-home text-info"></i> </span> Total Rooms - <span style="color: #696CFF;">{{ $total_rooms }}</span> </h4>
                    <h4 class="card-header m-0 me-2 pb-3"><span> <i class="bx bx-user text-info"></i> </span> Total Subscribers - <span style="color: #696CFF;">{{ $total_subscribers}}</span> </h4>
                    <h4 class="card-header m-0 me-2 pb-3"><span> <i class="bx bx-user text-info"></i> </span> Total Subscribers - <span style="color: #696CFF;">{{ $total_subscribers}}</span> </h4>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1>Recent Orders</h1>
                        <div class="text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order No</th>
                                        <th>Payment Method</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->order_no }}</td>
                                        <td>{{ $row->payment_method }}</td>
                                        <td>{{ $row->booking_date }}</td>
                                        <td>{{ $row->paid_amount }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_invoice',$row->id) }}" class="btn btn-primary">Detail</a>
                                            <a href="{{ route('admin_order_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Total Revenue -->

@endsection
