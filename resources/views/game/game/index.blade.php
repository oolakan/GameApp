@extends('dashboard.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            All game information
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Games</a></li>
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
                                <th>Game Name</th>
                                <th>Game Type</th>
                                <th>Game Option</th>
                                <th>Game Quater</th>
                                <th>Start Time</th>
                                <th>Stop Time</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Games as $game)
                                <tr>

                                    <td>{{$game->game_name->name}}</td>
                                    <td>{{$game->game_type->name}}</td>
                                    <td>{{$game->game_type_option->name}}</td>
                                    <td>{{$game->game_quater->name}}</td>
                                    <td>{{$game->start_time}}</td>
                                    <td>{{$game->stop_time}}</td>
                                    <td>@if( $game->game_status == 0 ) OPENED @else CLOSED @endif</td>

                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$game->id}}"><i class="fa fa-pencil"></i> Edit</a>
                                        <!-- Edit form-->
                                        @include('game.game.edit')
                                    </td>
                                    <td>
                                        <form method="GET" action="{{url('/game/delete/'.base64_encode($game->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Game" data-message="Are you sure you want to delete this game?">
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
    @include('game.game.create')
    @include('delete_confirm.delete_confirm')
@endsection