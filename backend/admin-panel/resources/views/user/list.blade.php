@extends('layouts.admin')

@section('admin-content')
<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">{{$title}}</h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="index.html">{{$title}}</a></li>
        </ol>
    </div>
    <!-- /Breadcrumb -->
</div>
<!-- /Title -->
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">{{$title}}</h6>
                </div>
                <div class="pull-right">
                    <button class="btn btn-success btn-icon-anim btn-xs" data-toggle="modal" href="#add" title="Add Country"><i class="fa fa-plus-square"></i></button>
                    <button onclick="location.reload();" class="btn btn-default btn-icon-anim btn-xs" title="Refresh"><i class="fa fa-refresh"></i></button>
                    <script>
                        var table = ['country'];
                        var image = "";
                    </script>
                    <button class="btn btn-danger btn-icon-anim btn-xs" onclick="return deleteall(table,image);" title="Delete Selected"><i class="fa fa-trash-o"></i></button>
                </div>
                <div class="clearfix"></div>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (Session::has('error'))
            <div class="alert alert-error alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><strong>!</strong> {{Session::get('error')}}</p> 
                <div class="clearfix"></div>
            </div>
            @endif
            
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><strong>YayOpps!</strong> {{Session::get('success')}}</p> 
                <div class="clearfix"></div>
            </div>
            @endif
            
            
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="">
                            <table id="myTable1" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>

                                        <td>
                                            <?php
                                            if ($list->level == 0) {
                                                echo "<span class='label label-default'>Manager</span>";
                                            } elseif ($list->level == 1) {
                                                echo "<span class='label label-primary'>Admin</span>";
                                            } elseif ($list->level == 2) {
                                                echo "<span class='label label-info'>Sup. Admin</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($list->status == 1) {
                                                echo "<span class='label label-success'>Active</span>";
                                            } elseif ($list->status == 0) {
                                                echo "<span class='label label-danger'>Inactive</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-default btn-icon-anim btn-xs" data-toggle="modal" data-target="#edit_{{$list->id}}" title="Edit"><i class="fa fa-pencil-square-o"></i></button>
                                            <a class="btn btn-danger btn-icon-anim btn-xs" href="{{url('delete-user', $list->id)}}" onclick="return check();"><i class="fa fa-eraser"></i></a>
                                        </td>
                                    </tr>
                                    <!--edit modal-->
                                    <div id="edit_{{$list->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                {!! Form::open(['url' => 'edit-user']) !!}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h5 class="modal-title">Update</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Username:</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $list->name }}" placeholder="username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Email:</label>
                                                            <input type="email" class="form-control" name="email" value="{{ $list->email }}" placeholder="example@gmail.com">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Password:</label>
                                                            <input type="password" class="form-control" name="password" placeholder="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Level:</label>
                                                            <select class="form-control" name="level">
                                                                <option value="0" <?php if($list->level == '0'){ echo 'selected'; } ?>>Manager</option>
                                                                <option value="1" <?php if($list->level == '1'){ echo 'selected'; } ?>>Admin</option>
                                                                <option value="2" <?php if($list->level == '2'){ echo 'selected'; } ?>>Super Admin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{ $list->id }}" required/>
                                                        <input type="hidden" name="old_email" value="{{ $list->email }}" required/>
                                                        <input type="hidden" name="admin" value="{{session::get('id')}}" required/>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--add modal-->
        <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url' => 'add_user']) !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h5 class="modal-title">Add User</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Username:</label>
                                <input type="text" class="form-control" name="name" placeholder="username" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Email:</label>
                                <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="password" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Confirmation password:</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="confirmation password" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Level:</label>
                                <select class="form-control" name="level">
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="admin" value="{{session::get('id')}}" required/>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection