<div class="modal fade" id="view-{{$transaction->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>GAME TRANSACTION SUMMARY</h4>
            </div>
                    <table class="table table-stripped">

                        <tr>
                            <th>Ticket Id</th>
                            <td>{{$transaction->ticket_id}}</td>
                        </tr>

                        <tr>
                            <th>Serial No</th>
                            <td>{{$transaction->serial_no}}</td>
                        </tr>

                        @if(!empty($transaction->banker_no))
                        <tr>
                            <th>Banker no</th>
                            <td>{{$transaction->banker_no}}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Game No Played</th>
                            <td>@if($transaction->game_type_option->name == '1 AGAINST ALL')
                                    All the rest
                                @else {{$transaction->game_no_played}}
                            @endif</td>
                        </tr>

                        <tr>
                            <th>Unit Stake</th>
                            <td>N{{number_format($transaction->unit_stake, 2, '.', ',')}}</td>
                        </tr>

                        <tr>
                            <th>Sales Amount</th>
                            <td>N{{number_format($transaction->total_amount, 2, '.', ',')}}</td>
                        </tr>

                        <tr>
                            <th>Payment Option</th>
                            <td>{{$transaction->payment_option}}</td>
                        </tr>

                        <tr>
                            <th>Game Name</th>
                            <td>{{$transaction->game_name->name}}</td>
                        </tr>

                        <tr>
                            <th>Draw Type</th>
                            <td>{{$transaction->draw_type}}</td>
                        </tr>

                        <tr>
                            <th>Game Type</th>
                            <td>{{$transaction->game_type->name}}</td>
                        </tr>

                        <tr>
                            <th>Game Type Option</th>
                            <td>{{$transaction->game_type_option->name}}</td>
                        </tr>

                        <tr>
                            <th>Game Quater</th>
                            <td>{{$transaction->game_quater->name}}</td>
                        </tr>

                        <tr>
                            <th>Date Played</th>
                            <td>{{$transaction->created_at}}</td>
                        </tr>

                        {{--<tr>--}}
                            {{--<th>Time Played</th>--}}
                            {{--<td>{{$transaction->time_played}}</td>--}}
                        {{--</tr>--}}

                        <tr>
                            <th>Winning Date</th>
                            <td>{{$transaction->date_played}}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{$transaction->status}}</td>
                        </tr>

                        <tr>
                            <th>Amount Won</th>
                            <td>N{{number_format($transaction->winning_amount, 2, '.', ',')}}</td>
                        </tr>
                        <tr>
                            <th>Recorded By</th>
                            <td>{{$transaction->user->name}}</td>
                        </tr>


                    </table>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->