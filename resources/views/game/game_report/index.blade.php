@extends('dashboard.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Game Report
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#">Game Report</a></li>
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
                           <form class="form-horizontal" role="form" method="POST" action="{{ url('/game/view/report') }}">
                           {{ csrf_field() }}
                           <!-- Date range -->
                               <div class="row col-md-6">
                                   <table id="example1" class="table table-bordered table-striped">
                                       <caption>SELECT DATE RANGE</caption>
                                        <tr><th>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" id="reservation" name="report_date">
                                                </div>
                                            </th>
                                            <th>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </th>
                                        </tr>
                                   </table>
                               <!-- /.input group -->
                               </div>
                           </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection