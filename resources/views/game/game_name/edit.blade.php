<div class="modal fade" id="edit-{{$game->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>MODIFY GAME</h4>
            </div>
            <form action="{{url('/game_name/update/'.base64_encode($game->id))}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Name</th>
                            <td><input type="text" name="name" value="{{$game->name}}" id="name" class="form-control"></td>
                        </tr>

                        <tr>
                            <th width="40%">Day</th>
                            <td>   <select name="days_id" required="" class="form-control">
                                    <option value="">Select Day</option>
                                    @foreach($Days as $day)
                                        <option value="{{$day->id}}" @if ($day->id == $game->day->id) selected @endif>{{$day->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th width="40%">Game Quater</th>
                            <td>   <select name="game_quaters_id" required="" class="form-control">
                                    <option value="">Select Quater</option>
                                    @foreach($GameQuaters as $quater)
                                        <option value="{{$quater->id}}" @if ($quater->id == $game->quater->id) selected @endif>{{$quater->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th width="40%">Start time</th>
                            <td><input type="time" name="start_time" value="{{$game->start_time}}" id="name" class="form-control"></td>
                        </tr>

                        <tr>
                            <th width="40%">Stop time</th>
                            <td><input type="time" name="stop_time" value="{{$game->stop_time}}" id="name" class="form-control"></td>
                        </tr>

                        <tr>
                            <th width="40%">Draw time</th>
                            <td><input type="time" name="draw_time" value="{{$game->draw_time}}" id="name" class="form-control"></td>
                        </tr>


                    </table>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Update</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->