@extends('frontend.master')
@section('content')
    <div>
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="d-flex py-5 px-4">
                            <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                            <div class="ps-4">
                                <h5 class="mb-3">Quality Servicing</h5>
                                <p>Unveiling perfection on every drive.Our commitment to quality service in every turn.</p>
                                {{-- <a class="text-secondary border-bottom" href="">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="d-flex bg-light py-5 px-4">
                            <i class="fa fa-users-cog fa-3x text-primary flex-shrink-0"></i>
                            <div class="ps-4">
                                <h5 class="mb-3">Expert Workers</h5>
                                <p>Mastering every turn, crafting automotive excellence. Our expert workers drive quality
                                    care.</p>
                                {{-- <a class="text-secondary border-bottom" href="">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="d-flex py-5 px-4">
                            <i class="fa fa-tools fa-3x text-primary flex-shrink-0"></i>
                            <div class="ps-4">
                                <h5 class="mb-3">Modern Equipment</h5>
                                <p>Your ride is our canvas. Modern equipment crafting masterpieces of automotive
                                    performance.</p>
                                {{-- <a class="text-secondary border-bottom" href="">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ url('frontend/assets/img/about.jpg') }}"
                        style="object-fit: cover;" alt="">
                    {{-- <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                        style="background: rgba(0, 0, 0, .08);">
                        <h1 class="display-4 text-white mb-0">15 <span class="fs-4">Years</span></h1>
                        <h4 class="text-white">Experience</h4>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6">

                <h1 class="mb-4"><span class="text-primary">Car Clinic</span> Is The Best Place For Your Auto Care</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                    Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                <h6>Professional & Expert</h6>
                                <span>Diam dolor diam ipsum sit amet diam et eos</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">02</span>
                            </div>
                            <div class="ps-3">
                                <h6>Quality Servicing Center</h6>
                                <span>Diam dolor diam ipsum sit amet diam et eos</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">03</span>
                            </div>
                            <div class="ps-3">
                                <h6>Awards Winning Workers</h6>
                                <span>Diam dolor diam ipsum sit amet diam et eos</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5">Our Expert Technicians</h1>
                </div>
                {{-- @dd($mechanics) --}}
                <div class="row g-4">
                    @foreach ($mechanics as $item)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" style="height: 400px;width:400px"
                                        src="{{ url('/uploads/mechanics', $item->image) }}" alt="">
                                </div>
                                <div class="bg-light text-center p-4">
                                    <h5 class="fw-bold mb-0">{{ $item->name }}</h5>
                                    <small class="text-capitalize">{{ $item->role }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->


    </div>
@endsection
