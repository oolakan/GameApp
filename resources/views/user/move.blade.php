<div class="modal fade" id="move-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>REASSIGN AGENT A NEW MERCHANT</h4>
            </div>
            <form action="{{url('/users/move/'.base64_encode($user->id))}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Agent Name</th>
                            <td width="60%"><input name="name" type="text" value="{{$user->name}}" class="form-control" placeholder="Name" required="" style="width: 80%"></td>
                        </tr>
                        <tr>
                            <th width="40%">Agent Email</th>
                            <td width="60%"> <input name="email" type="text" value="{{$user->email}}" class="form-control" placeholder="Email" required="" style="width: 80%"></td>
                        </tr>
                        <tr>
                            <th width="40%">Phone</th>
                            <td width="60%"> <input name="phone" type="text" value="{{$user->phone}}" class="form-control" placeholder="Phone" required="" style="width: 80%"></td>
                        </tr>
                        <tr>
                            <th width="40%">Select new merchant</th>
                            <td><select name="merchants_id" required="" class="form-control" style="width: 80%">
                                    <option value="">Assign Merchant</option>
                                    @foreach($Merchants as $merchant)
                                        <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                                    @endforeach
                                </select>
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