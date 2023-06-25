<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('Admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('Admin.layouts.nav_bar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Admin.layouts.side_bar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 page-name">@yield('main-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="@yield('page-link')">@yield('page-name')</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <!-- /.row -->
                    <!-- Main row -->
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <!-- Left col -->

                        @yield('content')
                        <!-- right col -->

                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('Admin.layouts.footer')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('Admin.layouts.scripts')

</body>

</html>
