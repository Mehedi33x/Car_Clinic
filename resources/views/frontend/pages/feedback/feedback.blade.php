@extends('frontend.master')
@section('content')
    {{-- <div>
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ url('/backend/assets/img/carousel-bg-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">

                    </ol>
                </nav>
            </div>
        </div>
    </div> --}}
    <div class="container-xxl py-5">
        <div class="container">


            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Feedback //</h6>
                <h1 class="mb-5">Share your valuable feedback</h1>
            </div>
            <div>
                <div class="row g-4">
                    <div class="col-md-6 mx-auto">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <p class="mb-4"></p>
                            <form action="{{ route('feedback.store.webpage') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ auth('customers')?->user()?->name }}" placeholder="Your Name"
                                                readonly>
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ auth('customers')?->user()?->email }}" readonly
                                                placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subject"
                                                placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 100px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
