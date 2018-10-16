@extends('dashboard.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Game Report
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <caption>
                                <div align ="left">
                                    <a class="btn btn-primary"  href="{{url('/game/report')}}"><i class="glyphicon glyphicon-fast-backward"></i> Go Back </a>
                                    <a class="btn btn-success"  href="{{url('/game/report/pdf/'.$dFrom.'/'.$dTo)}}"><i class="glyphicon glyphicon-export"></i> Export Report as Pdf </a>
                                    <a class="btn btn-primary"  href="{{url('/game/report/excel/'.$dFrom.'/'.$dTo)}}"><i class="glyphicon glyphicon-export"></i> Export Report as Excel </a>
                                </div>

                            </caption>
                            <thead>
                            @php($i = 1)
                            @php($totalSales = 0.0)
                            @php(($totalWon = 0.0))
                            @if(count($Transactions)>0)
                                <thead>
                                <tr id="report">
                                    <th>S/N</th>
                                    <th>Date Played</th>
                                    {{--<th>Merchant Name</th>--}}
                                    <th>Agent Name</th>
                                    <th>Agent Id</th>
                                    <th>Serial no.</th>
                                    <th>Game Name</th>
                                    <th>Game Option</th>
                                    <td>Draw Type</td>
                                    <th>Unit Stake</th>
                                    <th>Sales Amount</th>
                                    <th>Amount Won</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Transactions as $transaction)
                                    @if($transaction->user->name != null)
                                        @php($totalSales+=$transaction->total_amount)
                                        @php($totalWon+=$transaction->winning_amount)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$transaction->created_at}}</td>
                                            {{--<td>{{$transaction->name}}</td>--}}
                                            <td>{{$transaction->user->name}}</td>
                                            <td>{{$transaction->ticket_id}}</td>
                                            <td>{{$transaction->serial_no}}</td>
                                            <td>{{$transaction->game_name->name}}</td>
                                            <td>{{$transaction->game_type_option->name}}</td>
                                            <td>{{$transaction->draw_type}}</td>
                                            <td>N{{number_format($transaction->unit_stake, 2, '.', ',')}}</td>
                                            <td>N{{number_format($transaction->total_amount, 2, '.', ',')}}</td>
                                            <td>N{{number_format($transaction->winning_amount, 2, '.', ',')}}</td>
                                        </tr>
                                    @endif
                                    @php($i++)
                                @endforeach
                                <tr>
                                    <td></td>
                                    {{--<td></td>--}}
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>TOTAL AMOUNT</b></td>
                                    <td><b>N{{number_format($totalSales, 2, '.', ',')}}</b></td>
                                    <td><b>N{{number_format($totalWon, 2, '.', ',')}}</b></td>
                                </tr>
                                </tbody>
                                @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection