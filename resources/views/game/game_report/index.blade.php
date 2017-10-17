@extends('dashboard.app')

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
                                    <td>{{$transaction->serial_no}}</td>
                                    <td>{{$transaction->game_no_played}}</td>
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