@extends('layouts.front')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                {{-- <div class="row"> --}}
                    <div class="col-lg-9 col-md-12">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <h3>{{$category->name}}</h3>
                            </div>
                            
                        </div>
                        <div class="row product-grid-3">
                            @foreach ($product as $item)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{url('view-category/'.$category->slug.'/'.$item->slug)}}">
                                                    <img class="default-img"
                                                        src="{{ asset('uploads/product/' . $item->image) }}" alt="">
                                                    <img class="hover-img"
                                                        src="{{ asset('uploads/product/' . $item->image) }}" alt="">
                                                </a>
                                            </div>
                                            {{-- <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                        class="fi-rs-shuffle"></i></a>
                                            </div> --}}
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                {{-- <a href="shop.html">Music</a> --}}
                                            </div>
                                            <h2><a href="product-details.html">{{ $item->name }}</a></h2>
                                            {{-- <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div> --}}
                                            <div class="product-price">
                                                <span>{{$item->selling_price}}</span>
                                                <span class="old-price">{{$item->original_price}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up"
                                                    href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                   
                {{-- </div> --}}
            </div>
        </section>
    </main>
@endsection
