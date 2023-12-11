
@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">My Orders</h5>
        <a href="{{ url('admin/order-history') }}" class="btn btn-small btn-primary float-end">Order History</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Tracking No</th>
                        <th>Total Price</th>
                        <th>Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)


                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->tracking_no}}</td>
                       <td>{{$item->total_price}}</td>

                        <td>
                            <a href="{{url('admin/admin-view-order/'.$item->id)}}" class="btn-small d-block btn-primary btn">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection