@extends('frontend.master')
@section('content')
    <div class="container">
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Products</h1>
                    <nav aria-label="breadcrumb">
                        {{-- <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                        </ol> --}}
                    </nav>
                </div>
            </div>
        </div>

        <!-- Service Start -->
        <div class="container-xxl service py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-primary text-uppercase">Products</h6>
                    <h1 class="mb-5">Products</h1>
                </div>
                <div class="row g-4">
                    {{-- @dd($products) --}}
                    @foreach ($products as $item)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" style="height: 300px;width:300px"
                                        src="{{ url('/uploads/product', $item->image) }}" alt="">
                                </div>
                                <div class="bg-light text-center p-4">
                                    <h5 class="fw-bold mb-0">{{ $item->name }}</h5>
                                    <span class="fw-bold mb-0">Category: {{ $item->catData->name }} </span>
                                    <h6 class="fw-bold mb-0">{{ $item->price }} BDT</h6>
                                    <a href="{{ route('details.products.webpage', $item->id) }}">
                                        <small class="text-capitalize btn btn-success mt-2">Details</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>


        </div>
    @endsection
