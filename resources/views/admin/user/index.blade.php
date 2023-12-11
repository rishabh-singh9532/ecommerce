
@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">My Orders</h5>
        {{-- <a href="{{ url('admin/order-history') }}" class="btn btn-small btn-primary float-end">Order History</a> --}}

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>

                        <th>Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)


                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                       <td>{{$item->phone}}</td>
                       <td>{{$item->role_as==0?'user':'admin'}}</td>


                        <td>
                            <a href="{{url('admin/admin-user-detail/'.$item->id)}}" class="btn-small d-block btn-primary btn">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection