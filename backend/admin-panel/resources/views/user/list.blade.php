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
                                            <button class="btn btn-danger btn-icon-anim btn-xs" onclick="return check();"><i class="fa fa-eraser"></i></button>
                                        </td>
                                    </tr>
                                    <!--edit modal-->
                                    <div id="edit_{{$list->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title">Modal Content is Responsive</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label mb-10">Recipient:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label mb-10">Message:</label>
                                                            <textarea class="form-control" id="message-text"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger">Save changes</button>
                                                </div>
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
    </div>
</div>
<!-- Row -->
@endsection