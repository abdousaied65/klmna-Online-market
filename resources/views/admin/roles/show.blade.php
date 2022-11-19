@extends('admin.layouts.master')
<style>

</style>
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right" href="{{ route('admin.roles.index') }}">Back</a>
                        <h5 style="min-width: 300px;" class="pull-left alert alert-md alert-success">Show
                            [ {{$role->name}} ] Privilege</h5>
                        <div class="clearfix"></div>
                    </div>
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
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $value)
                                        @if($value->key == "admin")
                                            <label style="font-size: 16px;">
                                                {{ $value->name }}
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-pane fade" id="v-pills-privilege" role="tabpanel"
                                 aria-labelledby="v-pills-privilege-tab">
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $value)
                                        @if($value->key == "privilege")
                                            <label style="font-size: 16px;">
                                               {{ $value->name }}
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-pane fade" id="v-pills-reservation" role="tabpanel"
                                 aria-labelledby="v-pills-privilege-tab">
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $value)
                                        @if($value->key == "reservation")
                                            <label style="font-size: 16px;">
                                                {{ $value->name }}
                                            </label>
                                            <br>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main-content closed -->
@endsection
