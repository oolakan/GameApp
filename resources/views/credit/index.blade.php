@extends('dashboard.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Credit Balance Information
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Credit balance</a></li>
            <li class="active">view</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                <div class="box">
                    @include('flash::message')
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Amount</th>
                                <th>Edit / Topup credit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>{{@$user->credit->amount}}</td>
                                    <td><a class="btn btn-success" data-toggle="modal" data-target="#edit-{{$user->id}}"><i class="fa fa-pencil"></i> Edit / Topup credit</a>
                                        <!-- Edit form-->
                                        @include('credit.edit')
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

@endsection
