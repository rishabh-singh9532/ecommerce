@extends('layouts.front')
@section('content')
    <div class="container py-2">
        <div class="card">
            <div class="card-header">
                View Order
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <label for="">Frist name</label>
                        <div class="border p-2">{{ $order->fname }}</div>

                        <label for="">Frist name</label>
                        <div class="border p-2">{{ $order->lname }}</div>
                        <label for="">Frist name</label>
                        <div class="border p-2">{{ $order->email }}</div>
                        <label for="">Frist name</label>
                        <div class="border p-2">{{ $order->phone }}</div>
                        <label for="">shipping name</label>
                        <div class="border p-2">
                            {{ $order->address1 . ',' . $order->address2 . ',' . $order->city . ',' . $order->state . ',' . $order->country }}
                        </div>
                        <label for="">Frist name</label>
                        <div class="border p-2">{{ $order->pincode }}</div>





                    </div>
                    <div class="col-md-6">

                        <div class="card-body">


                            <table class="table ">
                                <thead>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderitem as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>

                                            <td><img src="{{ asset('uploads/product/' . $item->product->image) }}"
                                                    width="50px" alt=""></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Grand Total:{{$order->total_price}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
