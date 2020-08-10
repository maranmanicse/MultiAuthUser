@extends('layouts.app')

@section('content')
<style>
    .img-circle {
  
}

    </style>
<div class="container">
    

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}" id="alertMsg">{{ Session::get('message') }}</p>
    @endif

    <div class="row">
        <div class="col-md-8"> 
        <button class="btn btn-primary edit-profile" style="float:right"  data-href="{{ route('user.profileDetail',auth()->user()->id) }}" type="button">
            Edit Profile
        </button>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-4 img"> 
          <img src="{{url('public/images/')}}/{{$data->image?$data->image:'avatar.png'}}"  alt="" class="img-circle" style="  width: 200px;
          height: 200px;
          max-width: 200px;
          max-height: 200px;
          -webkit-border-radius: 50%;
          -moz-border-radius: 50%;
          border-radius: 50%;
          border: 5px solid rgba(10, 5, 5, 0.5);">
        </div>
        <div class="col-md-4 details">

          <blockquote>
          <h5>{{ $data->name}}</h5>
            <small><cite title="Source Title">{{$data->address}} <i class="icon-map-marker"></i></cite></small>
          </blockquote>
          <p>
            {{$data->email}} <br>
           
          </p>
        </div>
      </div>
</div>



</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('.edit-profile').on('click',function(){
            var url = $(this).data('href');
           window.location.href = url;
        })
        // remove session after update profile
        setTimeout(function(){ 
          sessionStorage.removeItem('alert-class');
          sessionStorage.removeItem('message');
           $("#alertMsg").hide();
         }, 3000);
    })

    </script>
@endsection
