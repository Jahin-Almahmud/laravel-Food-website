@extends('layouts.dashboard.app')
@section('title','Setting')
@section('bar_name','Setting')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Setting</a></li>
                    </ol>
                </div>
                <div class="row">
                   <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Address</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                 <form action="{{route('adminsetting.update')}}" method="post"> @csrf
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <textarea type="text" class="form-control" name="address" rows="5">{{address()->setting_value}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-10">
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   </div>
                   <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Email</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                 <form action="{{route('adminsetting.update')}}" method="post"> @csrf
                                    <div class="form-group row">

                                        <div class="col-12">
                                            <input type="email" class="form-control" value="{{Emailaddress()->setting_value}}" name="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   </div>
                   <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Number</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                 <form action="{{route('adminsetting.update')}}" method="post"> @csrf
                                    <div class="form-group row">

                                        <div class="col-12">
                                            <input type="number" class="form-control" value="{{book_a_tabel_number()->setting_value}}" name="Book_a_Table">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   </div>
                   <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Opening Hours</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                 <form action="{{route('adminsetting.update')}}" method="post"> @csrf
                                    <div class="form-group row">

                                        <div class="col-12">
                                            <input type="text" class="form-control" value="{{Opening()->setting_value}}" name="Opening">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
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
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
