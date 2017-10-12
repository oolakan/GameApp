<div class="modal fade" id="add-new-game" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i>ADD NEW GAME INFORMATION</h4>
            </div>
            <form action="{{url('/game/store')}}" method="post">
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
                                            <option value="{{$gameName->id}}">{{$gameName->name}}</option>
                                        @endforeach
                                    </select>

                             </td>
                        </tr>

                        <tr>
                            <th width="40%">Game Type</th>
                            <td>
                                <select name="game_types_id" required="" class="form-control">
                                    <option value="">Select Game Type</option>
                                    @foreach($GameTypes as $gameType)
                                        <option value="{{$gameType->id}}">{{$gameType->name}}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>


                        <tr>
                            <th width="40%">Game Type Option</th>
                            <td>
                                <select name="game_type_options_id" required="" class="form-control">
                                    <option value="">Select Game Type Option</option>
                                    @foreach($GameTypeOptions as $gameTypeOption)
                                        <option value="{{$gameTypeOption->id}}">{{$gameTypeOption->name}}</option>
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
                                        <option value="{{$gameQuater->id}}">{{$gameQuater->name}}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <th>Start Time</th>
                            <td><input type="text" name="start_time" value="{{old('start_time')}}" placeholder="Start Time" class="form-control"> </td>
                        </tr>

                        <tr>
                            <th>Stop Time</th>
                            <td><input type="text" name="stop_time" value="{{old('stop_time')}}" placeholder="Stop Time" class="form-control"> </td>
                        </tr>


                    </table>
                    <div class="modal-footer clearfix">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-book"></i>Submit</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->