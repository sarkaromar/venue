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
    
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="zmdi zmdi-block pr-15 pull-left"></i><p class="pull-left"><strong>Opps!</strong> {{Session::get('error')}}</p>
            <div class="clearfix"></div>
        </div>
        @endif

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left"><strong>Yay!</strong> {{Session::get('success')}}</p> 
            <div class="clearfix"></div>
        </div>
        @endif
        
        <div class="panel panel-danger contact-card card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="pull-left user-img-wrap mr-15">
                        <img class="card-user-img img-circle pull-left" src="{{url('/')}}/public/assets/dist/img/user1.png" alt="user"/>
                    </div>
                    <div class="pull-left user-detail-wrap">	
                        <span class="block card-user-name">
                            {{$info[0]->name}}
                        </span>
                        <span class="block card-user-desn">
                            <?php $level = $info[0]->level; ?>
                            @if($level == 0))
                            Manager
                            @elseif($level == 1)
                            Admin
                            @elseif($level == 2)
                            Super Admin
                            @endif
                        </span>
                    </div>
                </div>
                <div class="pull-right">
                    <a class="pull-left inline-block mr-15" data-toggle="modal" href="#personal">
                        <i class="zmdi zmdi-edit txt-light"></i>
                    </a>
                    <a class="pull-left inline-block mr-15" data-toggle="modal" href="#password">
                        <i class="fa fa-key fa-lg txt-light"></i>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                    <div class="user-others-details pl-15 pr-15">
                        <div class="mb-15">
                            <i class="zmdi zmdi-email-open inline-block mr-10"></i>
                            <span class="inline-block txt-dark">{{$info[0]->email}}</span>
                        </div>
                        <div class="mb-15">
                            <i class="zmdi zmdi-smartphone inline-block mr-10"></i>
                            <span class="inline-block txt-dark">0123456789 (dummy)</span>
                        </div>
                        <div class="mb-15">
                            <i class="zmdi zmdi-phone inline-block mr-10"></i>
                            <span class="inline-block txt-dark">0123456789 (dummy)</span>
                        </div>
                        <div>	
                            <i class="zmdi zmdi zmdi-skype inline-block mr-10"></i>
                            <span class="inline-block txt-dark">mostafij_rana (dummy)</span>
                        </div>
                    </div>
                    <hr class="light-grey-hr mt-20 mb-20"/>
                    <div class="emp-detail pl-15 pr-15">
                        <div class="mb-5">
                            <span class="inline-block capitalize-font mr-5">joininig date:</span>
                            <span class="txt-dark">{{$info[0]->created_at}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- personal modal-->
        <div id="personal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url' => 'personal-update']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title">Update Personal Information</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label mb-10">Username:</label>
                            <input type="text" class="form-control" name="name" value="{{$info[0]->name}}" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{$info[0]->email}}" placeholder="example@gmail.com" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="old_email" value="{{$info[0]->email}}" required/>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- password modal-->
        <div id="password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url' => 'password-update']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title">Update Password</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label mb-10">old Password:</label>
                            <input type="password" class="form-control" name="old_password" placeholder="old password" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label class="control-label mb-10">New Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10">Confirmation password:</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="confirmation password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>	  	   
</div>




<!-- Row -->
@endsection