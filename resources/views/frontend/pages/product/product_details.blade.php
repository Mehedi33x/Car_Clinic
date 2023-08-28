@extends('frontend.master')
@section('content')
    <div class="container">
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Product Details</h1>
                    <nav aria-label="breadcrumb">
                        {{-- <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Service Details</li>
                        </ol> --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Product Details</h1>
        </div>

        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-absolute img-fluid w-100 h-100"
                        src="{{ url('/uploads/product', $products->image) }}" style="object-fit: cover;" alt="">
                    {{-- <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                        style="background: rgba(0, 0, 0, .08);">
                        <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                        <h4 class="text-white">Experience</h4>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6">
                {{-- name --}}
                <h1 class="mb-4"><span class="text-primary">{{ $products->name }}</span></h1>
                {{-- description --}}
                <p class="mb-4">{{ $products->description }}</p>
                <span class="fw-bold mb-0">Stock: {{ $products->stock }}</span><br>
                <p class="btn btn-success text-capitalize">Product Price:{{ $products->price }} BDT</p>


            </div>
        </div>
    </div>
@endsection
