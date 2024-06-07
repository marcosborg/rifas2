@extends('layouts.app')
@section('content')
<div class="row mt-5">
    <div class="col-md-4 colspan-md-4 mt-5 pl-4 pr-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.home') }}">
                    {{ trans('panel.site_title') }}
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    {{ trans('global.register') }}
                </p>

                @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                            autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email"
                            value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                            autocomplete="email" autofocus placeholder="Entidade beneficiária" name="email"
                            value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                            autocomplete="email" autofocus placeholder="Contacto telefónico" name="email"
                            value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">{{ trans('global.remember_me') }}</label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('global.login') }}
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                @if(Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
                @endif
                <p class="mb-1">
                    <a href="\register">
                        Já tenho conta
                    </a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    body {
        background-image: url('/assets/body.jpg') !important;
        background-position: center center !important;
        background-size: cover !important;
    }
</style>
@endsection