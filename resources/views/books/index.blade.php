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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Books</h3>
            </div>   
            <div class="card-body"> 
                <table id="table_id" class="display table table-bordered table-hover dataTable dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>ISBN</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Public date</th>
                            <th>Category</th>
                            <th>Copies</th>
                            <th>Creation Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach  ($book as $b)
                            <tr>
                                <td>{{$b->id}}</td>
                                <td>{{$b->isbn}}</td>
                                <td>{{$b->name}}</td>
                                <td>{{$b->author}}</td>
                                <td>{{$b->publication_date}}</td>
                                <td>{{$b->category->name}}</td>
                                <td>
                                    @if ($b->copies==0)
                                        <span class="badge badge-danger">{{$b->copies}}</span>                                                                                
                                    @else
                                        {{$b->copies}}   
                                    @endif   
                                </td>
                                <td>{{date("Y-m-d",strtotime($b->created_at))}}</td>
                                <td>
                                    <form action="{{ route('books.delete',$b->id) }}" method="get">
                                        <a title="ver" href="{{ route('books.show',$b->id) }}" class="btn btn-success btn-xs">
                                            <i class="fa fa-eye"></i>   
                                        </a>  
                                        <a title="modificar" href="{{ route('books.edit',$b->id) }}" class="btn btn-warning btn-xs">
                                            <i class="fa fa-wrench"></i>   
                                        </a>                                      
                                        <button  class="btn btn-danger btn-xs" id="submitForm"><i class="fa fa-times"></i></button>
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
            $('#table_id').DataTable();
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
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value==true) {                                              
                        Swal.fire(
                            'requested!',
                            'Your book has been deleted.',
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
