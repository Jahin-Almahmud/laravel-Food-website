@extends('layouts.dashboard.app')

@section('title', 'slider')
@section('bar_name', 'slider')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">slider</a></li>

            </ol>
        </div>
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title  ">All slider</h4>
                     <a class="btn btn-danger float-right ml-3 mb-2 " href="{{route('adminslider.create')}}">+ Add slider</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead >

                                <tr>
                                    <th class="width80">Sl N.</th>
                                    <th>slider title </th>
                                    <th>slider description</th>
                                    <th>slider_image</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @forelse (sliders() as $key=>$slider)
                                    <tr>
                                        <td><strong>{{$key+1}}</strong></td>
                                        <td>{{$slider->slider_title }}</td>
                                        <td>{{$slider->slider_description}}</td>
                                        <td><img width="100" src="{{Storage::disk('public')->url('slider_image/'. $slider->slider_image)}}" alt="not"></td>
                                        <td>
                                            <a href="{{route('adminslider.edit',$slider->id)}}" class="badge badge-danger">Edit</i></a>
                                            <a href="javascript:void(0)" onclick="Delete({{$slider->id}})" class="badge badge-danger">Delete</i></a>
                                            <form id="delete-from-{{$slider->id}}" action="{{route('adminslider.destroy',$slider->id)}}" class="d-none" method="POST">
                                             @csrf
                                             @method('Delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">No slider found !</div>
                               @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       </div>
</div>
@endsection
@push('js')
<script>
function Delete(id) {
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        $('#delete-from-'+id).submit();
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    }
    })
}



</script>
@endpush
