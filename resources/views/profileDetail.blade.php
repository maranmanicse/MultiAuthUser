@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <a type="button" class="btn btn-link" href="{{Route('user.profile',auth()->user()->id)}}" style="float: right" >Close</a>
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
      
    </div>
        <div class="row">
            <div class="col-md-10 ">
                <form class="form-horizontal" method = "post" action="{{Route('user.update',auth()->user()->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Edit User profile</legend>

                        <!-- Text input-->




                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Name (Full name)">Name (Full name)</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input id="Name (Full name)" name="name" type="text"
                                        placeholder="Name (Full name)" class="form-control input-md" value="{{$data->name}}">
                                </div>


                            </div>


                        </div>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
                            <div class="col-md-4">
                                <input id="Upload photo" name="image" class="input-file" type="file">
                            </div>
                        </div>




                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email Address</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>

                                    </div>
                                    <input id="email" name="email" type="text"
                                        placeholder="Email Address" class="form-control input-md" value="{{old('email')?old('email'):$data->email}} ">

                                </div>

                            </div>
                        </div>


                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="address">Address (max 200
                                words)</label>
                            <div class="col-md-4">
                                <textarea class="form-control" rows="4" id="address" placeholder="Address"
                                    name="address" value="{{$data->address}}">{{$data->address}}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button  class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span>
                                    Submit</button>
                                <button href="#" class="btn btn-danger" value=""><span
                                        class="glyphicon glyphicon-remove-sign"></span> Clear</button>

                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        


    </div>
</div>
@endsection