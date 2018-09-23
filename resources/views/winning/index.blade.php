@extends('dashboard.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            All Winnings
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Winnings</a></li>
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
                            <caption> <div align ="right">
                                    <a class="btn btn-success" data-toggle="modal" data-target="#add-new-game"><i class="fa fa-plus"></i> Add New </a>
                                </div></caption>
                            <thead>
                            <tr>
                                <th>Winning No</th>
                                <th>Machine No</th>
                                <th>Game Name</th>
                                <th>Winning Date</th>
                                <th>Winning Time</th>
                                <th>Activate on Games</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Winnings as $winning)
                                <tr>

                                    <td>{{$winning->winning_no}}</td>
                                    <td>{{$winning->machine_no}}</td>
                                    <td>{{$winning->game_name->name}}</td>
                                    <td>{{$winning->winning_date}}</td>
                                    <td>{{$winning->winning_time}}</td>
                                    <td>
                                        <form method="GET" action="{{url('/winning/activate/'.base64_encode($winning->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#confirmValidate" data-title="Activate winning number on games" data-message="Are you sure you want to activate this winning information to games?">
                                                <i class="glyphicon glyphicon-arrow-up"></i> Validate Games for the day
                                            </button>
                                        </form>
                                    </td>
                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$winning->id}}"><i class="fa fa-pencil"></i> Edit</a>
                                        <!-- Edit form-->
                                        @include('winning.edit')
                                    </td>
                                    <td>
                                        <form method="GET" action="{{url('/winning/delete/'.base64_encode($winning->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Game" data-message="Are you sure you want to delete this winning information?">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
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