<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.min.css') }}" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- W3School 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/tenti.css') }}">
      <!-- Buat toogle -->
    <!-- <link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/toggle.css') }}"> -->
  
    <!-- <link rel="stylesheet" href="http://192.168.100.22/mypanel//assets/css/bootstrap.min.css"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/ionicons-2.0.1/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/ionicons-2.0.1/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/select2/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
    <!-- <link href="http://192.168.100.22/mypanel//assets/css/bootstrap-toggle.css" rel="stylesheet"> -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/skins/_all-skins.min.css') }}">
    <!-- <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/config.js" type="text/javascript"></script>

</head>
<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ url('panel1/grafik1') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">MP</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"> <p><b>My</b>Panel</p> </span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="lonceng">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="numbernotif">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" id="notip" ></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul id="notifikasi" class="menu">
                  <!-- <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>-->
                </ul>
              </li> 
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if (Auth::check())
                                    <!-- The user image in the navbar-->
                                    <img src="{{ asset('/img/member_avatar.png') }}" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{!! auth()->user()->name !!}</span>
                                @else
                                    <!-- The user image in the navbar-->
                                    <img src="{{ asset('/img/default-50x50.gif') }}" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">User</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    @if (Auth::check())
                                        <img src="{{ asset('/img/member_avatar.png') }}" class="img-circle" alt="User Image">

                                        <p>
                                            {!! auth()->user()->name !!}
                                            <small>{!! auth()->user()->email !!}</small>
                                        </p>
                                    @else
                                        <img src="{{ asset('/img/default-50x50.gif') }}" class="img-circle" alt="User Image">

                                        <p>
                                            User
                                            <small>Email</small>
                                        </p>
                                    @endif
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    @if (Auth::check())
                                        {{-- <div class="pull-left">
                                            <a href="{{ url('/settings/profile/') }}" class="btn btn-default btn-flat">Profil</a>
                                        </div> --}}
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                        </div>
                                    @else
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar ">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    @if (Auth::check())
                        <div class="pull-left image">
                            <img src="{{ asset('/img/member_avatar.png') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{!! auth()->user()->name !!}</p>
                            <!-- Status -->
                                <a href="#">
                                    <i class="fa fa-circle text-success"></i>
                                    Admin
                                </a>
                        </div>
                    @else
                        <div class="pull-left image">
                            <img src="{{ asset('/img/default-50x50.gif') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>User</p>
                            <!-- Status -->
                            <a href="#">
                                <i class="fa fa-circle text-success"></i>
                                Belum Terdaftar
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                        @if (Auth::check())
                            <!--
                            Hanya coba buat menu 'active' pakai Blade macro.
                            Tapi Lebih enak pakai Request::is()
                            -->

                            {!! Html::smartNav(url('home'), 'fa-home', 'Home') !!}
                            <!-- {!! Html::smartNav(url('panel2'), 'fa-bar-chart', 'Panel 2') !!} -->
                            <!-- {!! Html::smartNav(url('suhu'), 'fa-users', 'Data Pemilik') !!} -->
                            <!-- {!! Html::smartNav(url('kendaraan'), 'fa fa-bus', 'Data Kendaraan') !!} -->

                            <!-- {!! Html::smartNav(url('log'), 'fa fa-save', 'Log') !!} -->
                            


                            <li class="treeview {!! Request::is('panel1/*') ? 'active' : '' !!}">
                                <a href="{{ route('grafik1') }}">
                                    <i class="fa fa-sun-o"></i> <span>Node 1</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{!! Request::is('panel1/grafik1') ? 'active' : '' !!}">
                                        <a href="{{ route('grafik1') }}">
                                            <i class="fa fa-line-chart"></i> Graph
                                        </a>
                                    </li>
                                    <li class="{!! Request::is('panel1/log1') ? 'active' : '' !!}">
                                        <a href="{{ route('log1') }}">
                                            <i class="fa fa-save"></i> Log
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            
                            <li class="treeview {!! Request::is('panel2/*') ? 'active' : '' !!}">
                                <a href="{{ route('grafik2') }}">
                                    <i class="fa fa-sun-o"></i> <span>Node 2</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{!! Request::is('panel2/grafik2') ? 'active' : '' !!}">
                                        <a href="{{ route('grafik2') }}">
                                            <i class="fa fa-line-chart"></i> Graph

                                        </a>
                                    </li>
                                    <li class="{!! Request::is('panel2/log2') ? 'active' : '' !!}">
                                        <a href="{{ route('log2') }}">
                                            <i class="fa fa-save"></i> Log
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="treeview {!! Request::is('panel3/*') ? 'active' : '' !!}">
                                <a href="{{ route('grafik3') }}">
                                    <i class="fa fa-sun-o"></i> <span>Node 3</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{!! Request::is('panel3/grafik3') ? 'active' : '' !!}">
                                        <a href="{{ route('grafik3') }}">
                                            <i class="fa fa-line-chart"></i> Graph
                                        </a>
                                    </li>
                                    <li class="{!! Request::is('panel3/log3') ? 'active' : '' !!}">
                                        <a href="{{ route('log3') }}">
                                            <i class="fa fa-save"></i> Log
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="treeview {!! Request::is('logout') ? 'active' : '' !!}">
                                <!-- <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    <span></span> 
                                </a> -->

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @else
                            <li class="treeview">
                                <a href="{{ url('/register') }}">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Daftar Baru</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="{{ url('/login') }}">
                                    <i class="fa fa-lock"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                        @endif 

</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('dashboard')
        </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        @include('layouts._flash')
        @yield('content')

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        My Panel
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {!! date("Y") !!} <a href="#">MyPanel</a>.</strong> All rights reserved.
</footer>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('/admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Buat Toogle -->
<!-- <script src="http://192.168.100.22/mypanel//assets/vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!-- FastClick -->
<script src="{{ asset('/admin-lte/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin-lte/dist/js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/admin-lte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('/admin-lte/plugins/chartjs/Chart.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('/admin-lte/plugins/select2/select2.full.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('/js/custom.js') }}"></script>
<!-- <script src="http://192.168.100.22/mypanel//assets/js/bootstrap-toggle.js"></script> -->
<!-- Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->

<!-- excel function -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script> 

<script>
   $(document).ready(function() {
        $("#laravel_datatable").DataTable({
          "responsive": true,
          "autoWidth": true,
          "scrollX": true,
          "dom":'lBfrtip',
          "buttons": [
            "excel"
          
            
          ]
       
        });

               //get
            $.get( "/api/v1/notifikasi", function( data ) {
            let notif = data.length;
            console.log("tes "+notif)

            document.getElementById('numbernotif').innerHTML = notif;
            data.forEach(function(notif){
                $("#notifikasi").append('<li><a href="#">'+notif.keterangan+'</a></li>');
            })
        });

        $("#lonceng").click(function(){
            $("#notifikasi").empty()
            $.get( "/api/v1/notifikasi", function( data ) {
            data.forEach(function(notif){
                $("#notifikasi").append('<li><a href="#">'+notif.keterangan+'</a></li>');
            })
        });
        
            $.get( "/api/v1/notifikasi", function( data ) {
                let notip = data.length;
                document.getElementById('notip').innerHTML =`You have ${notip} notifications` ;
                $.ajax({
                        url: '/api/v1/notifikasi/1',
                        type: 'PUT',
                        success: function(response) {
                            $.get( "/api/v1/notifikasi", function( data ) {
                            let notif1 = data.length;
                            document.getElementById('numbernotif').innerHTML = notif1;
                             });
                        }
                    });
        
            })
        
            
        
        });
    });
</script>



@yield('scripts')

</body>
</html>
 