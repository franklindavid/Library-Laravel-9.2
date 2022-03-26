@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Maniak Library Software</h1>
@stop

@section('content')
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
                    <img class="img-fluid pad " src="{{asset('img/books/'.$book->image)}}" alt="Photo" width="195" height="293" >
                    <p><b>{{$book->name}}</b></p>
                    <p>{{$book->author}}</p>
                    <button type="button" class="btn btn-outline-secondary btn-sm request"  id='request'><i class="fas fa-book" ></i> Request</button>
                    <button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i> Watch</button>
                    @if ($book->copies==0)
                        <button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                    @else 
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-list"></i>{{$book->copies}} copies</button>
                    @endif
                    {{-- <span class="float-right text-muted">127 likes - 3 comments</span> --}}
                </div>
                    
                {{-- <div class="card-footer card-comments">
                    <div class="card-comment">        
                        <img class="img-circle img-sm" src="https://adminlte.io/themes/v3/dist/img/user3-128x128.jpg" alt="User Image">
                        <div class="comment-text">
                        <span class="username">
                        Maria Gonzales
                        <span class="text-muted float-right">8:03 PM Today</span>
                        </span>
                        It is a long established fact that a reader will be distracted
                        by the readable content of a page when looking at its layout.
                        </div>        
                    </div>
                    
                    <div class="card-comment">        
                        <img class="img-circle img-sm" src="https://adminlte.io/themes/v3/dist/img/user4-128x128.jpg" alt="User Image">
                        <div class="comment-text">
                        <span class="username">
                        Luna Stark
                        <span class="text-muted float-right">8:03 PM Today</span>
                        </span>
                        It is a long established fact that a reader will be distracted
                        by the readable content of a page when looking at its layout.
                        </div>        
                    </div>
                
                </div> --}}
                    
                {{-- <div class="card-footer">
                    <form action="#" method="post">
                    <img class="img-fluid img-circle img-sm" src="https://adminlte.io/themes/v3/dist/img/user4-128x128.jpg" alt="Alt Text">
                    
                    <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                    </div>
                    </form>
                </div> --}}
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
        $('.request').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, request it!'
                }).then((result) => {
                    console.log(result);
                    if (result.value==true) {
                        Swal.fire(
                            'requested!',
                            'Your book has been requested.',
                            'success'
                        )
                    }
                });
        });
    </script>
@stop
