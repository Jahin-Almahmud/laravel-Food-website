@extends('layouts.dashboard.app')

@section('title', 'food')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('adminfood.index')}}">food</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New</a></li>
            </ol>
        </div>
        <div class="row">
           <div class="col-xl-8 col-lg-8 m-auto">
               <div class="card">
                   <div class="card-header ">
                       <h4 class="card-title text-center m-auto ">Add food</h4>
                   </div>
                   <div class="card-body">
                       <div class="basic-form">
                           <form method="POST" action="{{route('adminfood.store')}}" enctype="multipart/form-data">
                            @csrf


                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Category</label>
                                   <div class="col-sm-9">
                                    <select name="category_id" class="form-control" id="">
                                        <option value="">-- Select Category -- </option>
                                        @foreach (categories() as $category)
                                        <option value="{{$category->id}}">{{$category->name}} </option>
                                        @endforeach
                                    </select>
                                   </div>`
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Food Image</label>
                                   <div class="col-sm-9">
                                       <input type="file" name="food_image" class="form-control" >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Food name</label>
                                   <div class="col-sm-9">
                                       <input type="text" name="food_name" class="form-control" >
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-3 col-form-label">Food price</label>
                                   <div class="col-sm-9">
                                       <input type="number" name="food_price" class="form-control" >
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
