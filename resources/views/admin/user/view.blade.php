@extends('layouts.admin')
@section('content')
    <div class="container py-2">
        <div class="card">
            <div class="card-header">
                View Order


            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class=" m-2">Name</label>
                        <div class="bordered p-2">{{$user->name}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">Email</label>
                        <div class="bordered p-2">{{$user->email}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">Phone</label>
                        <div class="bordered p-2">{{$user->phone}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">Adress1</label>
                        <div class="bordered p-2">{{$user->address1}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">Adress2</label>
                        <div class="bordered p-2">{{$user->address2}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">City</label>
                        <div class="bordered p-2">{{$user->city}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">State</label>
                        <div class="bordered p-2">{{$user->state}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">Country</label>
                        <div class="bordered p-2">{{$user->country}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="" class=" m-2">Pincode</label>
                        <div class="bordered p-2">{{$user->pincode}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
