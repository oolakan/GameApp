@extends('dashboard.app')
@section('header')
    <!-- DataTables -->
       <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            All game transactions
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Game Transactions</a></li>
            <li class="active">view</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    @include('flash::message')
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Ticket Id</th>
                                <th>Game Name</th>
                                <th>Game Option</th>
                                <th>Game Quater</th>
                                <th>Date Played</th>
                                <th>Time Played</th>
                                <th>View Info</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Transactions as $transaction)
                                <tr>

                                    <td>{{$transaction->ticket_id}}</td>
                                    <td>{{$transaction->game_name->name}}</td>
                                    <td>{{$transaction->game_type->name}}</td>
                                    <td>{{$transaction->game_type_option->name}}</td>
                                    <td>{{$transaction->game_quater->name}}</td>
                                    <td>{{$transaction->created_at}}</td>
                                    <td>{{$transaction->time_played}}</td>
                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#view-{{$winning->id}}"><i class="fa fa-pencil"></i> View </a>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('winning.create')
    @include('delete_confirm.delete_confirm')
@endsection


@section('footer')
 <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable();
        });
    </script>
@stop