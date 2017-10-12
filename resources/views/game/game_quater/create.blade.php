<div class="modal fade" id="add-new-game" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i>ADD NEW GAME</h4>
            </div>
            <form action="{{url('/game_quater/store')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Name</th>
                            <td><input type="text" name="name" value="{{old('name')}}" id="name" class="form-control"></td>
                        </tr>

                        {{--<tr>--}}
                            {{--<th width="40%">Start Time</th>--}}
                            {{--<td width="60%"><input name="start_time" type="text" value="{{old('start_time')}}" class="form-control" placeholder="Start time" required="" style="width: 80%"></td>--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<th width="40%">Stop Time</th>--}}
                            {{--<td width="60%"><input name="stop_time" type="text" value="{{old('stop_time')}}" class="form-control" placeholder="Stop Time" required="" style="width: 80%"></td>--}}
                        {{--</tr>--}}

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