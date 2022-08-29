@extends('layouts.dashboard.app')

@section('title', 'bookedtable')


@section('content')
<div class="content-body">
    <div class="container-fluid">

         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title  ">Table is booked</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead >

                                <tr>
                                    <th class="width80">Sl N.</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>date</th>

                                    <th>people</th>
                                    <th>message</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @forelse (bookedtables() as $key=>$bookedtable)
                                    <tr>
                                        <td><strong>{{$key+1}}</strong></td>
                                        <td class=""> {{$bookedtable->name}}</td>
                                        <td class=""> {{$bookedtable->email}}</td>
                                        <td class=""> {{$bookedtable->phone}}</td>
                                        <td class=""> {{$bookedtable->date}}</td>

                                        <td class=""> {{$bookedtable->people}}</td>
                                        <td class=""> {{$bookedtable->message}}</td>


                                        <td>

                                            <a href="javascript:void(0)" onclick="Delete({{$bookedtable->id}})" class="badge badge-danger">Delete</i></a>
                                            <form id="delete-from-{{$bookedtable->id}}" action="{{route('adminbooktable.delete',$bookedtable->id)}}" class="d-none" method="POST">
                                             @csrf
                                             @method('Delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">No bookedtable found !</div>
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
