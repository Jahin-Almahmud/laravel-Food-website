@extends('layouts.dashboard.app')

@section('title', 'gallery')
@section('bar_name', 'gallery')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">gallery</a></li>

            </ol>
        </div>
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title  ">All gallery</h4>
                     <a class="btn btn-danger float-right ml-3 mb-2 " href="{{route('admingallery.create')}}">+ Add gallery</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead >

                                <tr>
                                    <th class="width80">Sl N.</th>
                                    <th>Gallery Image</th>
                                    <th>Created at</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @forelse (gallerys() as $key=>$gallery)
                                    <tr>
                                        <td><strong>{{$key+1}}</strong></td>
                                        <td><img src="{{Storage::disk('public')->url('gallery_image/'.$gallery->gallery_image) }}" alt="not "></td>
                                        <td>{{$gallery->created_at}}</td>
                                        <td>

                                            <a href="javascript:void(0)" onclick="Delete({{$gallery->id}})" class="badge badge-danger">Delete</i></a>
                                            <form id="delete-from-{{$gallery->id}}" action="{{route('admingallery.destroy',$gallery->id)}}" class="d-none" method="POST">
                                             @csrf
                                             @method('Delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">No gallery found !</div>
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
