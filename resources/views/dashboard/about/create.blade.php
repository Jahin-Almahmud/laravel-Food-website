@extends('layouts.dashboard.app')

@section('title', 'about')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('adminabout.index')}}">about</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New</a></li>
            </ol>
        </div>
        <div class="row">
           <div class="col-xl-8 col-lg-8 m-auto">
               <div class="card">
                   <div class="card-header ">
                       <h4 class="card-title text-center m-auto ">Add about</h4>
                   </div>
                   <div class="card-body">
                       <div class="basic-form">
                           <form method="POST" action="{{route('adminabout.store')}}" enctype="multipart/form-data">
                            @csrf
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">About Description</label>
                                   <div class="col-sm-9">
                                       <textarea type="text" name="about_description" rows="5" class="form-control" ></textarea>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">About image</label>
                                   <div class="col-sm-9">
                                       <input type="file" name="about_image" class="form-control" >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">About youtube video backgroud img</label>
                                   <div class="col-sm-9">
                                       <input type="file" name="youtube_video_backgroud_img" class="form-control" >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">About youtube video url</label>
                                   <div class="col-sm-9">
                                       <input type="text" name="about_youtube_video_url" class="form-control" >
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <div class="col-sm-10">
                                       <button type="submit" class="btn btn-primary">Submit</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
        </div>
       </div>
</div>
@endsection
