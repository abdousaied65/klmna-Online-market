@extends('admin.layouts.master')
<style>

</style>
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">

            <strong>Errors : </strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]) !!}
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right" href="{{ route('admin.roles.index') }}">Back</a>
                        <h5 style="min-width: 300px;" class="pull-left alert alert-md alert-success">Edit
                            [ {{ $role->name }} ] Privilege</h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="main-content-label mg-b-5">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <p>Privilege Name :</p>
                                <input type="text" value="{{$role->name}}" readonly name="name" placeholder="Name"
                                       class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="row m-3 p-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user"
                                   role="tab" aria-controls="v-pills-user" aria-selected="true">
                                    Admins
                                </a>
                                <a class="nav-link" id="v-pills-privilege-tab" data-toggle="pill"
                                   href="#v-pills-privilege" role="tab" aria-controls="v-pills-privilege"
                                   aria-selected="false">
                                    Privileges
                                </a>
                                <a class="nav-link" id="v-pills-reservation-tab" data-toggle="pill"
                                   href="#v-pills-reservation" role="tab" aria-controls="v-pills-reservation"
                                   aria-selected="false">
                                    Reservations
                                </a>
                            </div>
                            <div class="tab-content p-5" id="v-pills-tabContent" style="border-left: 1px solid #ddd;">
                                <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel"
                                     aria-labelledby="v-pills-user-tab">
                                    @foreach($permission as $value)
                                        @if($value->key == "admin")
                                            <label style="font-size: 16px;">
                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{$value->name}}
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="v-pills-privilege" role="tabpanel"
                                     aria-labelledby="v-pills-privilege-tab">
                                    @foreach($permission as $value)
                                        @if($value->key == "privilege")
                                            <label style="font-size: 16px;">
                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                               {{$value->name}}
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="v-pills-reservation" role="tabpanel"
                                     aria-labelledby="v-pills-privilege-tab">
                                    @foreach($permission as $value)
                                        @if($value->key == "reservation")
                                            <label style="font-size: 16px;">
                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                               {{$value->name}}
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content closed -->
    {!! Form::close() !!}
@endsection
