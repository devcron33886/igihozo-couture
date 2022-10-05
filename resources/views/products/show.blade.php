@extends('layouts.cutomer')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $product->name }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('welcome') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{--{{ route('') }}--}}">{{ $product->category->name }}</a></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset('images/product-details/01.jpg')}}" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="{{ asset('images/product-details/01.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('images/product-details/02.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('images/product-details/03.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('images/product-details/04.jpg')}}" class="img" alt="#">
                                    <img src="{{ asset('images/product-details/05.jpg')}}" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category"><i class="lni lni-tag"></i> {{ $product->category->name }}</p>
                            <h3 class="price">{{ $product->formattedPrice() }}</h3>
                            <p class="info-text">{{ Str::limit($product->description,140) }}</p>
                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button class="btn" style="width: 100%;">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>{{ $product->description }}</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer-component/>
@endsection
