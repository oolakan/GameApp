<div class="modal fade" id="edit-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>EDIT/TOPUP CREDIT BALANCE</h4>
            </div>
            <form action="{{url('/credit/storeOrUpdate')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Amount</th>
                            <td width="60%">
                                <input name="users_id" type="hidden" value="{{$user->id}}" >
                                <input name="amount" type="text" value="{{@$user->credit->amount}}" class="form-control" placeholder="Amount" required="" style="width: 80%">
                            </td>
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