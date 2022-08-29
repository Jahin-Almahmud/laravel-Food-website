@extends('layouts.dashboard.app')

@section('title', 'about')
@section('bar_name', 'about')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">--</a></li>

            </ol>
        </div>
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title  ">All about</h4>
                     <a class="btn btn-danger float-right ml-3 mb-2 " href="{{route('adminabout.create')}}">+ Add about</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead >

                                <tr>
                                    <th class="width80">Sl N.</th>
                                    <th>About Description </th>
                                    <th>About image </th>
                                    <th>Backgroud img </th>
                                    <th>Status </th>


                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @forelse (abouts() as $key=>$about)
                                    <tr>
                                        <td><strong>{{$key+1}}</strong></td>
                                        <td>{{$about->about_description }}</td>
                                        <td><img width="50" src="{{Storage::disk('public')->url('about_image/'. $about->about_image)}}" alt="not"></td>
                                        <td><img width="50" src="{{Storage::disk('public')->url('about_image/youtube_video_backgroud_img/'. $about->about_youtube_video_backgroud_img)}}" alt="not"></td>
                                        <td class=""> <a href="{{route('adminabout.status',$about->id)}}" class="badge badge-danger">{{$about->status }}</i></a></td>
                                        <td>

                                            <a href="javascript:void(0)" onclick="Delete({{$about->id}})" class="badge badge-danger">Delete</i></a>
                                            <form id="delete-from-{{$about->id}}" action="{{route('adminabout.destroy',$about->id)}}" class="d-none" method="POST">
                                             @csrf
                                             @method('Delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">No about found !</div>
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
