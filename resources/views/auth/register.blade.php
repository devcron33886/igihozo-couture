@extends('layouts.app')
@section('content')
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3 class="text-center">{{ config('app.name') }} Register</h3>
                        </div>
                        <form class="row" method="post">

                            <div class="form-group">
                                <label for="reg-fn">Names</label>
                                <input type="text" name="name"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus
                                    placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="reg-email">E-mail Address</label>
                                <input type="email" name="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                    placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="reg-pass">Password</label>
                                <input type="password" name="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                    placeholder="{{ trans('global.login_password') }}">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="reg-pass-confirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required
                                    placeholder="{{ trans('global.login_password_confirmation') }}">
                            </div>

                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ route('login') }}">Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
