<div class="modal fade" id="view-{{$transaction->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>GAME TRANSACTION RECORDED BY {{$transaction->user->name}}</h4>
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

                        <tr>
                            <th>Game No Played</th>
                            <td>{{$transaction->game_no_played}}</td>
                        </tr>

                        <tr>
                            <th>Amount Paid</th>
                            <td>{{$transaction->amount_paid}}</td>
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
                            <td>{{$transaction->cretaed_at}}</td>
                        </tr>

                        <tr>
                            <th>Time Played</th>
                            <td>{{$transaction->time_played}}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{$transaction->status}}</td>
                        </tr>


                        <tr>
                            <th>Recorded By</th>
                            <td>{{$transaction->user->name}}</td>
                        </tr>


                    </table>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->