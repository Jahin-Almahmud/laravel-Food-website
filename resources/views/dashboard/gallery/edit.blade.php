@extends('layouts.dashboard.app')

@section('title', 'slider_eidt  ')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('adminslider.index')}}">slider</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
        <div class="row">
           <div class="col-xl-8 col-lg-8 m-auto">
               <div class="card">
                   <div class="card-header ">
                       <h4 class="card-title text-center m-auto ">Edit slider</h4>
                   </div>
                   <div class="card-body">
                       <div class="basic-form">
                           <form method="POST" action="{{route('adminslider.update', $slider->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Slider Title</label>
                                   <div class="col-sm-9">
                                       <input type="text" name="slider_title" value="{{$slider->slider_title}}" class="form-control" >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Slider Description</label>
                                   <div class="col-sm-9">
                                       <textarea name="slider_description" id="" class="form-control" cols="20" rows="5">{{$slider->slider_description}}</textarea>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Slider old Image</label>
                                   <div class="col-sm-9">
                                    <img width="100" src="{{Storage::disk('public')->url('slider_image/'. $slider->slider_image)}}" alt="not">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Slider Image</label>
                                   <div class="col-sm-9">
                                       <input type="file" name="slider_image" class="form-control" >
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
