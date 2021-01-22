@extends('templates.app')

@section('content')
<div class="cart-table-area section-padding-100">
    <h2 class=" text-center"> Welcome to Amado furniture store </h2>
    <img src="{{asset('img/registration.png')}}" alt="" class="loginImg  text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}
                                <span>Name</span>
                                <input id="name" type="text" class="form-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}

                            <input id="email" type="email" class="form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <span>@example.com</span>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
{{--                            </div>--}}
                        </div>

                        <div class="form-group">
{{--                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>--}}

{{--                            <div class="col-md-6">--}}
                            <span>Phone</span>

                            <input id="phone" type="text" class="form-field @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
{{--                            </div>--}}
                        </div>

                        <div class="form-group">
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
                            <span>Password</span>

                            <input id="password" type="password" class="form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
{{--                            </div>--}}
                        </div>

                        <div class="form-group">
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}
                            <span>Confirm password</span>

{{--                            <div class="col-md-6">--}}
                                <input id="password-confirm" type="password" class="form-field" name="password_confirmation" required autocomplete="new-password">
{{--                            </div>--}}
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn amado-btn mb-15">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
    </div>
@endsection
