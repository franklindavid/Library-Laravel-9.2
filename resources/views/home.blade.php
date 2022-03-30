@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Maniak Library Software</h1>
@stop

@section('content')
    @include('flash::message')
    <div class="panel">
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
                    <div class="card-body" >   
                        <a href="{{ route('books.show',$book->id) }}"><img class="img-fluid pad " src="{{ asset($book->image) }}" alt="Photo" width="195" height="293" ></a>                    
                        <p><b>{{$book->name}}</b></p>
                        <p>{{$book->author}}</p>
                            <button type="button" class="btn btn-outline-success btn-sm" onclick="location.href='{{ route('books.show',$book->id) }}'" ><i class="fas fa-eye"></i> Watch</button>
                            @if ($book->copies==0)
                                <button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                            @else
                                <a class="btn btn-outline-secondary btn-sm" id="submitForm" data-request={{$book->id}}><i class="fas fa-book"></i> Request</a> 
                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                            @endif                 
                    </div>  
                </div>
            @if ($count==3 )
                </div>
                @php
                    $count=0;
                @endphp
            @endif            
        @endforeach  
    </div>       
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    document.addEventListener('DOMContentLoaded', () => {
        const request = document.querySelector('.panel').addEventListener('click', requestList);
    });
    function requestList(e){
        // $('#submitForm').click(function(e) {
            if(e.target.dataset.request || e.target.parentElement.dataset.request){ 
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
                        url="{{ route('books.request','joker') }}";
                        if(e.target.dataset.request){
                            url=url.replace("joker", e.target.dataset.request);
                        }else if(e.target.parentElement.dataset.request){
                            url=url.replace("joker", e.target.parentElement.dataset.request);
                        }
                        console.log(url);
                        setTimeout(()=>{
                            window.location.href = url;
                        },2000); 
                    }
                });

            }
        // });

    }        
    </script>
@stop
