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
                    <span class="info-box-icon bg-green"><i class="ion ion-person"></i></span>

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
                    <span class="info-box-icon bg-yellow"><i class="ion ion-person"></i></span>
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
                    <span class="info-box-icon bg-red"><i class="fa glyphicon-fast-forward"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Game Transactions</span>
                        <span class="info-box-number">{{number_format(count($Transactions), 0, '.', ',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->




            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green-active"><i class="fa glyphicon-fast-forward"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transactions Today</span>
                        <span class="info-box-number">{{number_format(count($TransTodayCount), 0, '.', ',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->




            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa glyphicon-fast-forward"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transactions This Week</span>
                        <span class="info-box-number">{{number_format(count($TransWeekCount), 0, '.', ',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa glyphicon-fast-forward"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transactions this month</span>
                        <span class="info-box-number">{{number_format(count($TransMonthCount), 0,'.', ',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa glyphicon-fast-forward"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Amount Today</span>
                        <span class="info-box-number">N{{number_format($TransToday, 2, '.', ',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-black-gradient"><i class="fa glyphicon-fast-forward"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Amount This Week</span>
                        <span class="info-box-number">N{{number_format($TransWeek, 2, '.', ',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green-active"><i class="fa glyphicon-fast-forward"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Amount This Month</span>
                        <span class="info-box-number">N{{number_format($TransMonth, 2, '.', ',')}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            @if(count($GamesOfDay) > 0)
                <div class="content-header">
                    <h1>Game of the day</h1>
                </div>
            @endif
            <br>
            @foreach($GamesOfDay as $gamesOfDay)
            <div class="col-md-3">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$gamesOfDay->name}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: block;">
                        Start time: {{strtoupper(date('h:i a', strtotime($gamesOfDay->start_time)))}}<br>
                        Stop time: {{strtoupper(date('h:i a', strtotime($gamesOfDay->stop_time)))}}<br>
                        Draw time: {{strtoupper(date('h:i a', strtotime($gamesOfDay->draw_time)))}}<br>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
                @endforeach
        </div>

    </section>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
<!-- /.row -->
@endsection