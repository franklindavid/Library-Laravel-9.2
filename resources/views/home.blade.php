@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Maniak Library Software</h1>
@stop

@section('content')
    @include('flash::message')
    @php
        $count = 0;
    @endphp
    @foreach ($books as $book)
        @php
            $count++;
        @endphp 
        @if ($count==1)
            <div class="row" id="hola">
        @endif        
            <div class="col-md-4">
                <div class="card-body">   
                    <a href="{{ route('books.show',$book->id) }}"><img class="img-fluid pad " src="{{ asset($book->image) }}" alt="Photo" width="195" height="293" ></a>                    
                    <p><b>{{$book->name}}</b></p>
                    <p>{{$book->author}}</p>
                    <form action="{{ route('books.request',$book->id) }}" method="get">
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="location.href='{{ route('books.show',$book->id) }}'" ><i class="fas fa-eye"></i> Watch</button>
                        @if ($book->copies==0)
                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                        @else 
                            <button  class="btn btn-outline-secondary btn-sm" id="submitForm"><i class="fas fa-book"></i>Request</button>
                            <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                        @endif
                    </form>                    
                </div>  
            </div>
        @if ($count==3 )
            </div>
            @php
                $count=0;
            @endphp
        @endif            
    @endforeach     
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $('#submitForm').click(function(e) {
            e.preventDefault();
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
                            $(this).parents('form').submit();
                        },2000); 
                    }
                });
        });
    </script>
@stop
