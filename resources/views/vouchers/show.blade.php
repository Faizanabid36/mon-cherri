@extends('layouts.app')
@section('title', 'Dashboard - Profile')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a>
                                <img class="rounded-circle" alt="User Image" src="{{asset('images/user/'.$user->avatar)}}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ucwords($user->name)}}</h4>
                            <h6 class="text-muted">
                                @foreach($user->roles as $user_role)
                                    <span class="badge badge-danger">{{$user_role->name}}</span>
                                @endforeach
                            </h6>
                            <div class="about-text">{{ucwords($user->email)}}</div>
                        </div>
                        <div class="col-auto profile-btn">
                            @permission('edit.users')
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-success bs_btn_color bs_dashboard_btn">
                                Edit
                            </a>
                            @endpermission
                            @role('admin')
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#role_modal" class="btn btn-dark bs_dashboard_btn">
                                Change Role
                            </a>
                            @endrole
                        </div>
                    </div>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade active show" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>User Info</span>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">First Name</p>
                                            <p class="col-sm-4">{{$user->info->first_name ?? 'not-updated'}}</p>
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Last Name</p>
                                            <p class="col-sm-4">{{$user->info->last_name ?? 'not-updated'}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-4">{{$user->email}}</p>
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Phone</p>
                                            <p class="col-sm-4">{{$user->info->phone ?? 'not-updated'}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">City</p>
                                            <p class="col-sm-4 mb-0">{{ $user->info->city->city_name ?? 'not-updated'}}</p>
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">State</p>
                                            <p class="col-sm-4 mb-0">{{$user->info->state->state_name ?? 'not-updated'}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Country</p>
                                            <p class="col-sm-4 mb-0">{{$user->info->country->country_name ?? 'not-updated'}}</p>
                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                            <p class="col-sm-4 mb-0">{{$user->info->address ?? 'not-updated'}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-3">

                                <!-- Account Status -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>User Permissions</span>
                                            @role('admin')
                                            <a class="edit-link" href="javascript:void(0)" data-toggle="modal" data-target="#permission_modal"><i class="fa fa-edit mr-1"></i> Edit</a>
                                        </h5>
                                        @endrole
                                        <ul class="list-group">
                                            @foreach($user->permissions as $user_permission)
                                                <li class="list-group-item"><span class="badge badge-danger">{{$user_permission->name}}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Account Status -->

                            </div>
                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->
                </div>
            </div>
        </div>
    </div>
    @role('admin')
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="role_modal">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('users.changeRole',$user->id)}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Change User Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Role</label>
                        <?php
                        $roles = DB::table('roles')->get();
                        ?>
                        <select class="form-control" name="role" required>
                            @foreach($roles as $role)
                                <option value="{{$role->slug}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success bs_btn_color bs_dashboard_btn" type="submit">Change</button>
                        <button type="button" class="btn btn-secondary bs_dashboard_btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="PermissionsModal" aria-hidden="true" id="permission_modal">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('users.givePermissions',$user->id)}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Give Permissions to User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Permissions</label>
                        <?php
                        $permissions = DB::table('permissions')->get();
                        ?>
                        <select class="form-control" name="permissions[]" id="select-permissions" multiple required style="width: 100%">
                            @foreach($permissions as $permission)
                                <option value="{{$permission->id}}"
                                <?php
                                    foreach ($user->permissions as $u_perm){
                                        ?>
      					<?=($u_perm->id == $permission->id) ? "selected" : ''?>
      				<?php
                                    }
                                    ?>
                                >{{$permission->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success bs_btn_color bs_dashboard_btn" type="submit">Give</button>
                        <button type="button" class="btn btn-secondary bs_dashboard_btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endrole
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#select-permissions").select2();
        })
    </script>
@endsection
