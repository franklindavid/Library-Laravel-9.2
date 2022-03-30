@extends('adminlte::page')

@section('title', 'Show Book')

@section('plugins.Datatables',true)

@section('content_header')
    <h1>Maniak Library Software</h1>
@stop

@section('content')  
@include('flash::message') 
<div class="panel">  
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="row">
                    <img class="img-fluid pad " src="{{ asset($book->image) }}" alt="Photo" width="195" height="293" >
                </div>
                <br>
                <br>
                <div class="row">                
                    @if ($book->copies==0)
                        <button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                    @else 
                        <a class="btn btn-outline-secondary btn-sm" id="submitForm1" data-request={{$book->id}}><i class="fas fa-book"></i> Request</a>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                    @endif
                </div>
                <br>
                <dl class="row">
                    <dt class="col-sm-3">ISBN</dt>
                    <dd class="col-sm-9">{{$book->isbn}}</dd>

                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{$book->name}}</dd>
                
                    <dt class="col-sm-3">Author</dt>
                    <dd class="col-sm-9">{{$book->author}}</dd>     

                    <dt class="col-sm-3">Publication date</dt>
                    <dd class="col-sm-9">{{$book->publication_date}}</dd>      

                    <dt class="col-sm-3">Category</dt>
                    <dd class="col-sm-9">
                        <p>{{$book->category->name}}</p>
                        <p>{{$book->category->description}}</p>
                    </dd>
                    
                </dl>
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
                                        <a href="#" data-return={{$bs->pivot->id}} class="btn btn-primary btn-xs" id="submitForm2"><i class="fa fa-arrow-alt-circle-up"></i> Return</a>
                                    </td>
                                </tr>
                            @endforeach                        
                        </tbody>
                    </table>
                </div>
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
        document.addEventListener('DOMContentLoaded', () => {
            const request = document.querySelector('.panel').addEventListener('click', returnList);
        });

        $('#submitForm1').click(function(e) {
            e.preventDefault();
            if(e.target.dataset.request || e.target.parentElement.dataset.request || e.target.dataset.return || e.target.parentElement.dataset.return){                   
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, request it!'
                    }).then((result) => {
                        if (result.value==true) {                        
                            Swal.fire(
                                'requested!',
                                'Your book has been requested.',
                                'success'
                            )
                            setTimeout(()=>{
                                window.location.href = "{{ route('books.request',$book->id) }}";
                            //     $(this).parents('form').submit();
                            },2000); 
                        }
                    });
            }
        });

        function returnList(e){
            e.preventDefault();
            if(e.target.dataset.return || e.target.parentElement.dataset.return){ 
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
                        Swal.fire(
                            'requested!',
                            'Your book has been Returned.',
                            'success'
                        )
                        url="{{ route('books.return','joker') }}";
                        if(e.target.dataset.return){
                            url=url.replace("joker", e.target.dataset.return);
                        }else if(e.target.parentElement.dataset.return){
                            url=url.replace("joker", e.target.parentElement.dataset.return);
                        }
                        setTimeout(()=>{
                            window.location.href = url;
                        },2000); 
                    }
                });
            }            
        }

    </script>
@stop
