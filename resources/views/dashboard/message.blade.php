@extends('layouts.dashboard.app')

@section('title', 'message')
@section('bar_name', 'message')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">messages</a></li>

            </ol>
        </div>
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title  ">All message</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead >

                                <tr>
                                    <th class="width80">Sl N.</th>
                                    <th>Name </th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @forelse (messages() as $key=>$message)
                                    <tr>
                                        <td><strong>{{$key+1}}</strong></td>
                                        <td class=""> {{$message->name}}</td>
                                        <td class=""> {{$message->email}}</td>
                                        <td class=""> {{$message->Message}}</td>

                                        <td>

                                            <a href="javascript:void(0)" onclick="Delete({{$message->id}})" class="badge badge-danger">Delete</i></a>
                                            <form id="delete-from-{{$message->id}}" action="{{route('adminmessage.delete',$message->id)}}" class="d-none" method="POST">
                                             @csrf
                                             @method('Delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">No message found !</div>
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
