@extends('layouts.front')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an account?</span>
                                <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click
                                    here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details
                                    below. If you are a new customer, please proceed to the Billing &amp; Shipping section.
                                </p>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox"
                                                    id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember
                                                        me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Have a coupon?</span> <a
                                    href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click
                                    here to enter your code</a></span>
                        </div>
                        <div class="panel-collapse collapse coupon_form " id="coupon">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Coupon Code...">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn  btn-md" name="login">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('placeorder') }}">
                        @csrf
                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Billing Details</h4>
                            </div>

                            <div class="form-group">
                                <input type="text" required="" name="fname" value="{{Auth::user()->name}}" placeholder="First name *">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="lname" value="{{Auth::user()->lname}}" placeholder="Last name *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="email" value="{{Auth::user()->email}}" placeholder="email">
                            </div>

                            <div class="form-group">
                                <input type="text" name="phone" required="" value="{{Auth::user()->phone}}" value="{{Auth::user()->name}}" placeholder="phone Number *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="address1" required="" value="{{Auth::user()->address1}}" placeholder="Address line1">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="address2" value="{{Auth::user()->address2}}" placeholder="address line 2*">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="city" value="{{Auth::user()->city}}" placeholder="city *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="state" value="{{Auth::user()->state}}" placeholder="state*">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="country" value="{{Auth::user()->country}}" placeholder="country *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="pincode" placeholder="Pincode *" value="{{Auth::user()->pincode}}">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Your Orders</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $item)
                                                <tr>
                                                    <td class="image product-thumbnail"><img
                                                            src="{{ asset('uploads/product/' . $item->product->image) }}"
                                                            alt="#"></td>
                                                    <td>
                                                        <h5><a href="product-details.html">{{ $item->product->name }}</a>
                                                        </h5>
                                                        <span class="product-qty">{{ $item->prod_qty }}</span>
                                                    </td>
                                                    <td>{{ $item->product->selling_price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                                <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
