@extends('layouts.auth')
@section('content')
<div class="d-none d-lg-block col-lg-4">
    <div class="slider-light">
        <div class="slick-slider">
            <div>
                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                    <div class="slide-img-bg" style="background-image: url({{asset('/assets_admin/images/originals/citynights.jpg')}});"></div>
                    <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>
                        <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
    <div class="mx-auto app-login-box col-sm-12 col-md-8 col-lg-6">
        <div class="app-logo"></div>
        <h4>
            <div>Forgot your Password?</div>
            <span>Use the form below to recover it.</span></h4>
        <div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex align-items-center"><h6 class="mb-0"><a href="{{route('login')}}" class="text-primary">Sign in existing account</a></h6>
                    <div class="ml-auto">
                        <button class="btn btn-primary btn-lg">Recover Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
