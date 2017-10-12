<div class="modal fade" id="edit-{{$game->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>MODIFY GAME</h4>
            </div>
            <form action="{{url('/game_type/update/'.base64_encode($game->id))}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">

                        <tr>
                            <th width="40%">Name</th>
                            <td width="60%"><input name="name" type="text" value="{{$game->name}}" class="form-control" placeholder="Name" required="" style="width: 80%"></td>
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