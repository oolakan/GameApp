@extends('dashboard.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            {{--<small>Easy Study</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-person"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Admins</span>
                        <span class="info-box-number">{{count($Admins)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-person"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Merchants</span>
                        <span class="info-box-number">{{count($Merchants)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-person"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agents</span>
                        <span class="info-box-number">{{count($Agents)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-key"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Game Transactions</span>
                        <span class="info-box-number">{{count($Transactions)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->


            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-key"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Winnings</span>
                        <span class="info-box-number">{{count($Winnings)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->


        </div>
        <!-- /.row -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
<!-- /.row -->
@endsection