<div class="modal fade" id="add-new-game" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i>ADD NEW WINNING GAME</h4>
            </div>
            <form action="{{url('/winning/store')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <input type="hidden" name="users_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                        <tr>
                            <th>Winning No.</th>
                            <td><input type="text" name="winning_no" value="{{old('winning_no')}}" placeholder="Winning no." class="form-control"> </td>
                        </tr>

                        <tr>
                            <th>Machine No.</th>
                            <td><input type="text" name="machine_no" value="{{old('machine_no')}}" placeholder="Machine no." class="form-control"> </td>
                        </tr>

                        <tr>
                            <th>Winning Date</th>
                            <td><input type="date" name="winning_date" value="{{old('winning_date')}}" placeholder="Winning Date" class="form-control"> </td>
                        </tr>

                        {{--<tr>--}}
                            {{--<th>Winning Time</th>--}}
                            {{--<td><input type="time" name="winning_time" value="{{old('winning_time')}}" placeholder="Winning Time" class="form-control"> </td>--}}
                        {{--</tr>--}}

                        <tr>
                            <th width="40%">Game Name</th>
                            <td>
                                    <select name="game_names_id" required="" class="form-control">
                                        <option value="">Select Game Name</option>
                                        @foreach($GameNames as $gameName)
                                            <option value="{{$gameName->id}}">{{$gameName->name}}->{{$gameName->day->name}}->{{$gameName->draw_time}}</option>
                                        @endforeach
                                    </select>

                             </td>
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