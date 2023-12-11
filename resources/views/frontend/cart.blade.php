@extends('layouts.front');
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total=0; @endphp
                                    @foreach ($cart as $item)
                                        <tr class="product-data">
                                            <td class="image product-thumbnail"><img
                                                    src="{{ asset('uploads/product/' . $item->product->image) }}"
                                                    alt="#"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a
                                                        href="product-details.html">{{ $item->product->name }}</a></h5>

                                            </td>
                                            <td class="price" data-title="Price">
                                                <span>{{ $item->product->original_price }}</span></td>
                                            <td class="text-center" data-title="Stock">
                                                <div class="input-group text-center mb-3" style="width: 130px">
                                                    <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">

                                                    @if($item->product->quantity >= $item->prod_qty)

                                                    <span class=" input-group-text changequantitybutton decreament-btn ">-</span>
                                                    
                                                    <input type="text" name="quantity"
                                                        class="form-control text-center qty-val" value="{{$item->prod_qty}}">
                                                    <span class="qty-down input-group-text changequantitybutton increament-btn">+</span>
                                                    @php $total+=$item->product->original_price* $item->prod_qty @endphp
                                                    @else
                                                    <a href="#" class="btn btn-danger btn-sm">Out of Stock</a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span>{{ $item->product->original_price }}</span>
                                            </td>
                                            <td class="action" data-title="Remove">
                                                
                                                <button class="delete-cart-item btn btn-danger"><i
                                                        class="fi-rs-trash">Remove</i></button>
                                                </a>
                                            </td>
                                        </tr>
                                       
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                       
                        <div class="cart-action text-end">
                            {{-- <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a> --}}
                            <div>RS:{{$total}}</div>
                            <a class="btn " href="{{route('checkout')}}"><i class="fi-rs-shopping-bag mr-10"></i>Proceed to Checkout</a>
                        </div>
                        {{-- <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div> --}}

                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $('.increament-btn').click(function(e) {
                e.preventDefault();
                var inc_val = $(this).closest('.product-data').find('.qty-val').val();
                var value = parseInt(inc_val, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++
                    $(this).closest('.product-data').find('.qty-val').val(value);
                }
            });

            $('.decreament-btn').click(function(e) {
                e.preventDefault();
                var inc_val = $(this).closest('.product-data').find('.qty-val').val();
                var value = parseInt(inc_val, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--
                    $(this).closest('.product-data').find('.qty-val').val(value);
                }
            });

            $('.delete-cart-item').click(function(e) {
                e.preventDefault();
                var prod_id = $(this).closest('.product-data').find('.prod_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "delete-cart-item",
                    data: {
                        'prod_id': prod_id,
                    },

                    success: function(response) {
                        window.location.reload();
                        alert(response.status);
                    }
                });

            });
            $('.changequantitybutton').click(function (e) { 
                e.preventDefault();
                var prod_id = $(this).closest('.product-data').find('.prod_id').val();
                var qty = $(this).closest('.product-data').find('.qty-val').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                 $.ajax({
                    type: "POST",
                    url: "update-cart",
                    data: {
                        'prod_id':prod_id,
                        'qty':qty,
                    },
                   
                    success: function (response) {
                        window.location.reload();
                        // alert(response)
                    }
                 });
                
            });
        });
    </script>
@endsection
