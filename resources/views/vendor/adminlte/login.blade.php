@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
<!-- <link rel="stylesheet" href="http://192.168.100.22/mypanel//assets/vendor/bootstrap/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="{{ asset('/bslogin/css1/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.min.css') }}">
    
    @yield('css')
@stop

@section('header')
<link rel="shortcut icon" href="{{ asset('favicon.png') }}">


@section('body_class', 'login-page')
<body class="hold-transition register-page bg-green">

@section('body')
<div class="page-holder d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
                    <div class="pr-lg-5">
                        <img src="{{ asset('/img/login1.png') }}" alt="" class="img-fluid">
                    </div>
            </div>

                <div class=" col-lg-5 px-lg-4 pr-lg-5">  
                    <div class="login-box bg-green">
                        <div class="login-logo ">
                            <a href="{{ url(config('adminlte.dashboard_url', 'grafik')) }}"><b>My</b>Panel</a>
                        </div>
                <!-- /.login-logo -->

                    <div class="login-box-body bg-green ">
                        <p class="login-box-msg ">Sistem Monitoring Arus dan Tegangan pada Panel Surya</p>
                        <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="{{ trans('adminlte::adminlte.email') }}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" name="password" class="form-control"
                                placeholder="{{ trans('adminlte::adminlte.password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember">{{ trans('adminlte::adminlte.remember_me') }}</label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn  btn-block bg-olive " >
                                    {{ trans('adminlte::adminlte.sign_in') }}
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <br>
                    <p>
                        <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}" class="text-center">
                            <!-- {{ trans('adminlte::adminlte.i_forgot_my_password') }} -->
                        </a>
                    </p>
                    @if (config('adminlte.register_url', 'register'))
                        <p>
                            <a href="{{ url(config('adminlte.register_url', 'register')) }}" class="text-center text-olive" >
                                <!-- {{ trans('adminlte::adminlte.register_a_new_membership') }} -->
                                Register a new account 
                            </a>
                        </p>
                    @endif
            </div>
            </div>
            </div>
        </div>
    </div> 
</div>
@stop

@section('adminlte_js')
    @yield('js')
@stop
