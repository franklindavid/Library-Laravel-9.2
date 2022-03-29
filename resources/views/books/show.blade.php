@extends('adminlte::page')

@section('title', 'Show Book')

@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content_header')
    <h1>Maniak Library Software</h1>
@stop

@section('content')  
@include('flash::message')   
<div class="row">
    <div class="col-12">
        <div class="card-body">
            <img class="img-fluid pad " src="{{ asset($book->image) }}" alt="Photo" width="195" height="293" >
            <p><b>{{$book->name}}</b></p>
            <p>{{$book->author}}</p>
            <button type="button" class="btn btn-outline-secondary btn-sm request"  id='request'><i class="fas fa-book" ></i> Request</button>
            @if ($book->copies==0)
            <button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
            @else 
            <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
            @endif
        </div>
    </div>   
</div>  

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users with books borrowing</h3>
            </div>   
            <div class="card-body"> 
                <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach  ($book->users as $bs)
                            <tr id="row{{$bs->id}}">
                                <td>{{$bs->id}}</td>
                                <td>{{$bs->name}}</td>
                                <td>{{$bs->pivot->created_at->diffForHumans()}}</td>
                                <td>
                                    <form action="{{ route('books.return',$bs->pivot->id) }}" method="get">
                                        <button  class="btn btn-primary btn-xs" id="submitForm"><i class="fa fa-arrow-alt-circle-up"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $(document).ready( function () {
            var table = $('#table_id').DataTable();
        } );
        $('#submitForm').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, return it!'
                }).then((result) => {
                    if (result.value==true) {
                        // this.closest('tr').remove();
                        Swal.fire(
                            'returned!',
                            'Your book has been return.',
                            'success'
                        )
                        setTimeout(()=>{
                            $(this).parents('form').submit();
                        },2000); 
                    }
                });
        });
    </script>
@stop
