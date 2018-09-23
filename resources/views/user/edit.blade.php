<div class="modal fade" id="edit-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i>MODIFY ADMIN INFO</h4>
            </div>
            <form action="{{url('/users/change_status/'.base64_encode($user->id))}}" method="post" novalidate>
                {{ csrf_field() }}
                <div class="modal-body">
                    <table class="table table-stripped">
                        <tr>
                            <th width="40%">Name</th>
                            <td width="60%"><input name="name" type="text" value="{{$user->name}}" class="form-control" placeholder="Name" required="" style="width: 80%"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td> <input name="email" type="text" value="{{$user->email}}" class="form-control" placeholder="Email" required="" style="width: 80%"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td> <input name="phone" type="text" value="{{$user->phone}}" class="form-control" placeholder="Phone" required="" style="width: 80%"></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td> <select name="roles_id" required="" class="form-control" style="width: 80%" disabled>
                                    <option value="">Select Role</option>
                                    @foreach($Roles as $role)
                                        <option value="{{$role->id}}" @if($role->id == $user->role->id) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Change Status</th>
                            <td>
                                <select name = "approval_status" class="form-control" style="width: 80%">
                                    <option value="PENDING" @if( $user->approval_status == 'PENDING') selected @endif>PENDING</option>
                                    <option value="APPROVED"  @if( $user->approval_status == 'APPROVED') selected @endif>APPROVED</option>
                                    <option value="BLOCKED"  @if( $user->approval_status == 'BLOCKED') selected @endif>BLOCKED</option>
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