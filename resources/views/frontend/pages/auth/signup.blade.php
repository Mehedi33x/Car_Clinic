@extends('frontend.master')
@section('content')

<div>


    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center p-4 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4 text-center">Signup</h1>
                        <form action="{{route('signup.store.webpage')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                {{-- user details --}}
                                <h6 class="text-white mb-1 text-center"></h6>
                                <div class="col-6 col-sm-12">
                                    <label for="name" class="text-white">Name:</label>
                                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name" style="height: 55px;" required>
                                </div>

                                <div class="col-12 col-sm-12">
                                    <label for="email" class="text-white">Email:</label>
                                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;" required>
                                </div>

                                <div class="col-6 col-sm-12">
                                    <label for="password" class="text-white">Password:</label>
                                    <input type="password" name="password" class="form-control border-0" placeholder="Password" style="height: 55px;" required>
                                </div>

                                <div class="col-6 text-center" >
                                    <button class="btn btn-secondary w-100 py-3" type="submit">Signup</button>
                                </div>
                            </div>
                        </form>

                        <br>
                        <div class="card-footer" style="color: white">
                            <div class="d-flex  links">
                                Already have an account?<div class="col-4 text-center">
                                    <a href="{{route('login.webpage')}}" class="btn btn-secondary w-100 py-2"> Login</a>
                                </div>
                            </div>
                            {{-- <div class="d-flex justify-content-center">
                                <a href="">Forgot your password?</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
