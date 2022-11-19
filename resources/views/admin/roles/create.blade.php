@extends('admin.layouts.master')
<style>

</style>
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Errors :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">

                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right" href="{{ route('admin.roles.index') }}">Back</a>
                        <h5 style="min-width: 300px;" class="pull-left alert alert-md alert-success"> Add New
                            Privilege</h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}
                    <div class="main-content-label mg-b-5">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <p> Privilege Name :</p>
                                    {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <p> is Set For :</p>
                                    <select required name="guard_name" class="form-control" id="">
                                        <option value="">Choose one of These : </option>
                                        <option value="admin-web">Admins</option>
                                        <option value="client-web">Clients</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-3 p-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user"
                               role="tab" aria-controls="v-pills-user" aria-selected="true">
                                Admins
                            </a>
                            <a class="nav-link" id="v-pills-privilege-tab" data-toggle="pill" href="#v-pills-privilege"
                               role="tab" aria-controls="v-pills-privilege" aria-selected="false">
                                Privileges
                            </a>
                            <a class="nav-link" id="v-pills-course-tab" data-toggle="pill"
                               href="#v-pills-course" role="tab" aria-controls="v-pills-course"
                               aria-selected="false">
                                Courses
                            </a>
                            <a class="nav-link" id="v-pills-family-tab" data-toggle="pill"
                               href="#v-pills-family" role="tab" aria-controls="v-pills-family"
                               aria-selected="false">
                                Customers
                            </a>
                            <a class="nav-link" id="v-pills-request-tab" data-toggle="pill"
                               href="#v-pills-request" role="tab" aria-controls="v-pills-request"
                               aria-selected="false">
                                Requests
                            </a>
                            <a class="nav-link" id="v-pills-student-tab" data-toggle="pill"
                               href="#v-pills-student" role="tab" aria-controls="v-pills-student"
                               aria-selected="false">
                                Students
                            </a>
                            <a class="nav-link" id="v-pills-client-tab" data-toggle="pill"
                               href="#v-pills-client" role="tab" aria-controls="v-pills-client"
                               aria-selected="false">
                                Clients
                            </a>
                        </div>
                        <div class="tab-content p-5" id="v-pills-tabContent" style="border-left: 1px solid #ddd;">
                            <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel"
                                 aria-labelledby="v-pills-user-tab">
                                @foreach($permission as $value)
                                    @if($value->key == "admin")
                                        <label style="font-size: 16px;">
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
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
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{$value->name}}
                                        </label>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="v-pills-course" role="tabpanel"
                                 aria-labelledby="v-pills-course-tab">
                                @foreach($permission as $value)
                                    @if($value->key == "course")
                                        <label style="font-size: 16px;">
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{$value->name}}
                                        </label>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="v-pills-family" role="tabpanel"
                                 aria-labelledby="v-pills-family-tab">
                                @foreach($permission as $value)
                                    @if($value->key == "family")
                                        <label style="font-size: 16px;">
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{$value->name}}
                                        </label>
                                        <br>
                                    @endif
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="v-pills-request" role="tabpanel"
                                 aria-labelledby="v-pills-request-tab">
                                @foreach($permission as $value)
                                    @if($value->key == "request")
                                        <label style="font-size: 16px;">
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{$value->name}}
                                        </label>
                                        <br>
                                    @endif
                                @endforeach
                            </div>


                            <div class="tab-pane fade" id="v-pills-student" role="tabpanel"
                                 aria-labelledby="v-pills-student-tab">
                                @foreach($permission as $value)
                                    @if($value->key == "student")
                                        <label style="font-size: 16px;">
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{$value->name}}
                                        </label>
                                        <br>
                                    @endif
                                @endforeach
                            </div>


                            <div class="tab-pane fade" id="v-pills-client" role="tabpanel"
                                 aria-labelledby="v-pills-client-tab">
                                @foreach($permission as $value)
                                    @if($value->key == "client")
                                        <label style="font-size: 16px;">
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{$value->name}}
                                        </label>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="button" id="check_all" class="btn btn-danger"> Select All</button>
                            <button type="submit" class="btn btn-info">Confirm</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- main-content closed -->
    <script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
    <script>
        $('#check_all').click(function () {
            $('input[type=checkbox]').prop('checked', true);
        });
    </script>
@endsection
