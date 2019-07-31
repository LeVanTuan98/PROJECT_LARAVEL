@extends('frontend.layouts.fashion')

@section('content')
    <div class="login">
        <div class="main-agileits">
            <div class="form-w3agile">
                <h3>Register</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="key">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        <div class="clearfix"></div>
                    </div>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>
    </div>
@endsection
