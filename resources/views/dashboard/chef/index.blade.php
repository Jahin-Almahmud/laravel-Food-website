@extends('layouts.dashboard.app')

@section('title', 'chef')
@section('bar_name', 'chef')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Chef</a></li>

            </ol>
        </div>
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title  ">All chef</h4>
                     <a class="btn btn-danger float-right ml-3 mb-2 " href="{{route('adminchef.create')}}">+ Add chef</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead >

                                <tr>
                                    <th class="width80">Sl N.</th>
                                    <th>Chef Image </th>
                                    <th>Chef Name </th>
                                    <th>Chef title </th>
                                    <th>Chef description</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @forelse (chefs() as $key=>$chef)
                                    <tr>
                                        <td><strong>{{$key+1}}</strong></td>
                                        <td><img width="50" src="{{Storage::disk('public')->url('chef_image/'. $chef->chef_image)}}" alt="not"></td>
                                        <td>{{$chef->chef_name }}</td>
                                        <td>{{$chef->chef_title }}</td>
                                        <td>{{$chef->chef_description }}</td>

                                        <td>

                                            <a href="javascript:void(0)" onclick="Delete({{$chef->id}})" class="badge badge-danger">Delete</i></a>
                                            <form id="delete-from-{{$chef->id}}" action="{{route('adminchef.destroy',$chef->id)}}" class="d-none" method="POST">
                                             @csrf
                                             @method('Delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">No chef found !</div>
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
