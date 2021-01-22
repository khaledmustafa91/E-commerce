@extends('templates.app')

@section('content')
<div class="cart-table-area section-padding-100">
    <h2 class=" text-center"> Welcome to Amado furniture store </h2>
    <img src="{{asset('img/login.png')}}" alt="" class="loginImg  text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">

                            <input type="email" class="form-field  @error('email') is-invalid @enderror" placeholder="Email" name="email" id='email' value="{{ old('email') }}" required autocomplete="email" autofocus />
                            <span>@gmail.com</span>
                            {{--                            <label for="email" class="form__label">{{ __('E-Mail Address') }} </label>--}}
                            <br>
                            @error('email')
                            <p class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                            @enderror
                        </div>


{{--                        <div class="form__group field">--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form__field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                                <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>--}}
{{--                        </div>--}}

{{--                            </div>--}}


                        <div class="form-group">
{{--                            <span>Password</span>--}}
                            <input type="password" class="form-field  @error('password') is-invalid @enderror" placeholder="Password" name="password" id='password' value="{{ old('email') }}" required autocomplete="email" autofocus />

                            {{--                            <label for="password" class="form__label">{{ __('Password') }} </label>--}}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>



{{--                        <div class="form__group field">--}}
{{--                            <label for="password" class="col-md-4 form__label">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form__field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row justify-content-center" style="margin-left: 208px;">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-10">
                                <button type="submit" class="btn amado-btn mb-15">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>

    </div>
    </div>
@endsection
