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
                                <th>Serial no.</th>
                                <th>Game Name</th>
                                <th>Draw Type</th>
                                <th>Game Option</th>
                                <th>Date Played</th>
                                <th>Time Played</th>
                                <th>Status</th>
                                <th>Matched Numbers</th>
                                <th>Winning Amount</th>
                                <th>Validate Ticket</th>
                                <th>View Info</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Transactions as $transaction)
                                <tr>

                                    <td>{{$transaction->ticket_id}}</td>
                                    <td>{{$transaction->serial_no}}</td>
                                    <td>{{$transaction->game_name->name}}</td>
                                    <td>{{$transaction->draw_type}}</td>
                                    <td>{{$transaction->game_type_option->name}}</td>
                                    <td>{{$transaction->date_played}}</td>
                                    <td>{{$transaction->time_played}}</td>
                                    <td>{{$transaction->status}}</td>
                                    <td>{{$transaction->no_of_matched_figures}}</td>
                                    <td>{{$transaction->winning_amount}}</td>

                                    <td>
                                        <form method="GET" action="{{url('/winning/activate/one/'.base64_encode($transaction->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#confirmValidate" data-title="Validate game number played" data-message="Are you sure you want to validate this game number?">
                                                <i class="glyphicon glyphicon-arrow-up"></i> Validate
                                            </button>
                                        </form>
                                    </td>

                                    </td>
                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#view-{{$transaction->id}}"><i class="glyphicon glyphicon-view"></i> View Game</a>
                                    @include('game.game_transactions.view')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $Transactions->links() }}
                    </div>
                        {{--<div class="container">--}}
                            {{--@foreach ($Transactions as $transaction)--}}
                                {{--{{ $transaction->ticket_id }}--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
@include('delete_confirm.delete_confirm')