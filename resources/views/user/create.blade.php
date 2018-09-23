@extends('dashboard.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <section class="content">
    <div class="col-xs-6">
    <div class="register-box-body">
        <p class=""><h1>Add New sUser</h1></p>
        @include('partials.flash_message')
        <form action="{{url('/users/store')}}" novalidate method="post" >
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Full name" required="" value="{{old('name')}}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required="" value="{{old('email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="number" name="phone" class="form-control" placeholder="Phone" required="" value="{{old('phone')}}">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="location" class="form-control" placeholder="Location" required="" value="{{old('location')}}">
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <select name="roles_id" required="" class="form-control" id="role">
                    <option value="">Select Role</option>
                    @foreach($Roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group has-feedback" id="merchant">
                <select name="merchants_id" required="" class="form-control">
                    <option value="">Assign Merchant</option>
                    @foreach($Merchants as $merchant)
                        <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group has-feedback">
                <input type="password"  name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
        </div>
        </section>

@endsection