@extends('layouts.dashboard.app')

@section('title', 'food')
@section('bar_name', 'food')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Food</a></li>

            </ol>
        </div>
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title  ">All food</h4>
                     <a class="btn btn-danger float-right ml-3 mb-2 " href="{{route('adminfood.create')}}">+ Add food</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead >

                                <tr>
                                    <th class="width80">Sl N.</th>
                                    <th>Food Image </th>
                                    <th>Food name </th>
                                    <th>Food price </th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @forelse (foods() as $key=>$food)
                                    <tr>
                                        <td><strong>{{$key+1}}</strong></td>
                                        <td><img width="50" src="{{Storage::disk('public')->url('food_image/'. $food->food_image)}}" alt="not"></td>
                                        <td class=""> {{$food->food_name}}</td>
                                        <td class=""> {{$food->food_price}}</td>

                                        <td>

                                            <a href="javascript:void(0)" onclick="Delete({{$food->id}})" class="badge badge-danger">Delete</i></a>
                                            <form id="delete-from-{{$food->id}}" action="{{route('adminfood.destroy',$food->id)}}" class="d-none" method="POST">
                                             @csrf
                                             @method('Delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">No food found !</div>
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
