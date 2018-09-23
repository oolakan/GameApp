@extends('dashboard.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Agents
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Merchant</a></li>
            <li class="active">view</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Ticket Id</th>
                                <th>Credit Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($MerchantAgents as $user)
                                <tr>
                                    <td>{{$user->agent_name}}</td>
                                    <td>{{$user->ticket_id}}</td>
                                    <td>{{$user->credit_balance}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection