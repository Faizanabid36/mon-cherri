@extends('layouts.app')
@section('title', 'Dashboard - Center Stone Colors')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Center Stone</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Stone Color</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            @permission('create.colors')
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Color Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if(\Illuminate\Support\Facades\Session::has('errors'))
                                    <p class="alert alert-danger small">
                                        <span class="text-danger">{{Session::get('errors')->first()}}</span>
                                    </p>
                                @endif
                                <span class="badge badge-primary">Add new color</span>
                                <form action="{{route('center_stone.color.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Color Title </label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Color Priority </label>
                                                <input type="number" min="0" name="priority" class="form-control"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-success bs_dashboard_btn bs_btn_color">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endpermission
            @permission('view.colors')
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Stone Color</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                        <tr>
                                            <th>Count</th>
                                            <th>Title</th>
                                            <th>Priority</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1; ?>
                                        @foreach($center_stone_colors as $variation)
                                            <tr>
                                                <td><?=$count++?></td>
                                                <td>{{ucwords($variation->title)}}</td>
                                                <td>{{ucwords($variation->priority)}}</td>

                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        @permission('edit.variations')
                                                        <a href="javascript:void(0)"
                                                           class="btn btn-sm bg-success-light mr-2 bs_edit"
                                                           data-id="{{$variation->id}}"
                                                           data-route="{{route('variations.edit',$variation->id)}}"><i
                                                                class="fa fa-edit"></i></a>
                                                        @endpermission
                                                        @permission('delete.variations')
                                                        <a href="javascript:void(0)"
                                                           class="btn btn-sm bg-danger-light bs_delete"
                                                           data-route="{{route('variations.destroy',$variation)}}"><i
                                                                class="fa fa-trash"></i></a>
                                                        @endpermission
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endpermission
        </div>
    </div>
    @include('partials.attr_modal')
@endsection
