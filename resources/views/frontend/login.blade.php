@extends('layouts.master')
@section('content')
    <section class="parallax-container overlay-1" data-parallax-img="{{ asset('assets/images/logedin.jpg') }}">
        <div class="parallax-content breadcrumbs-custom context-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-9">
                        <h2 class="breadcrumbs-custom-title">Login Here</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact us-->
    <section class="section section-lg bg-gray-1 text-center">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-9 col-lg-7">
                    <h3>Login</h3>
                    <!-- RD Mailform-->
                    @if(session('success'))
                        <div style="text-align: left;padding-left: 0;color: red;" class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Signin</button>
                        </div>
                    </form>
                    <p>Don't have a account? <a href="{{ route('register.page') }}">Register Here!</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
