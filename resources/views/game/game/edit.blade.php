<div class="modal fade" id="edit-{{$game->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>MODIFY GAME INFORMATION</h4>
            </div>
            <form action="{{url('/game/update/'.base64_encode($game->id))}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <input type="hidden" name="users_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                        <tr>
                            <th width="40%">Game Name</th>
                            <td>
                                <select name="game_names_id" required="" class="form-control">
                                    <option value="">Select Game Name</option>
                                    @foreach($GameNames as $gameName)
                                        <option value="{{$gameName->id}}" @if($gameName->id == $game->game_name->id) selected @endif>{{$gameName->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <th width="40%">Game Quater</th>
                            <td>
                                <select name="game_quaters_id" required="" class="form-control">
                                    <option value="">Select Game Quater</option>
                                    @foreach($GameQuaters as $gameQuater)
                                        <option value="{{$gameQuater->id}}" @if($gameQuater->id == $game->game_quater->id) selected @endif>{{$gameQuater->name}}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <th>Start Time</th>
                            <td><input type="text" name="start_time" value="{{$game->start_time}}" placeholder="Start Time" class="form-control"> </td>
                        </tr>

                        <tr>
                            <th>Stop Time</th>
                            <td><input type="text" name="stop_time" value="{{$game->stop_time}}" placeholder="Stop Time" class="form-control"> </td>
                        </tr>

                        <tr>
                            <th>Draw Time</th>
                            <td><input type="text" name="draw_time" value="{{$game->draw_time}}" placeholder="Draw Time" class="form-control"> </td>
                        </tr>

                        <tr>
                            <th>Game Status</th>
                            <td>
                                <select name = "game_status" class="form-control">
                                    <option value="0" @if( $game->game_status == 0) selected @endif>OPENED</option>
                                    <option value="1"  @if( $game->game_status == 1) selected @endif>CLOSED</option>
                                </select>
                            </td>
                        </tr>


                    </table>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-book"></i> Update </button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->