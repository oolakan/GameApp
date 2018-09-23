@extends('dashboard.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Users information
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Admins</a></li>
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
                                    <a class="btn btn-success"  href="{{url('/users/create')}}"><i class="fa fa-plus"></i> Add New </a>
                                </div></caption>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Location</th>
                                <th>Role</th>
                                <th>Ticket Id</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($UserInfo as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->location}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>{{$user->ticket_id}}</td>
                                    <td>{{$user->approval_status}}</td>
                                    <!--if user is a merchant, view agents under him-->

                                    <td>
                                        @if($user->role->id == 2)  <a class="btn btn-info" href="{{url('/users/view/merchant/'.$user->id)}}"><i class="fa fa-arrow"></i> View Agents </a> @endif
                                        @if($user->role->id == 3) <a class="btn btn-success" data-toggle="modal" data-target="#move-{{$user->id}}"><i class="fa fa-arrow"></i> Move </a>
                                        @endif
                                        <!-- Edit form-->
                                        @include('user.move')
                                    </td>

                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$user->id}}"><i class="fa fa-pencil"></i> Edit</a>
                                        <!-- Edit form-->
                                        @include('user.edit')
                                    </td>
                                    <td>
                                        <form method="GET" action="{{url('/users/delete/'.base64_encode($user->id))}}" accept-charset="UTF-8" style="display:inline">
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
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

    @include('delete_confirm.delete_confirm')
@endsection