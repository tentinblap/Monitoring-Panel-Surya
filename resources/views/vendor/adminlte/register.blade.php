@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
<!-- <link rel="stylesheet" href="http://192.168.100.22/mypanel//assets/vendor/bootstrap/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="{{ asset('/bslogin/css1/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.min.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')
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
                <div class="register-box bg-green mt-18">
                    <div class="register-logo mb-4">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}"><b>My</b>Panel</a>
                    </div>

                    <div class="register-box-body bg-green">
                        <p class="login-box-msg">Sistem Monitoring Arus dan Tegangan pada Panel Surya</p>
                        <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                                    {{ csrf_field() }}
                            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                            </div>

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

                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                    </div>

                            <button type="submit" class="btn btn-block bg-olive">
                                    {{ trans('adminlte::adminlte.register') }}
                                </button>
                            </form>
                            <br>
                            <p>
                                <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center ">
                                    {{ trans('adminlte::adminlte.i_already_have_a_membership') }}
                                </a>
                            </p>
                </div>
            </div> <!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>
</div>


@stop

@section('adminlte_js')
    @yield('js')
@stop
