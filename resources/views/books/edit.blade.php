@extends('adminlte::page')

@section('title', 'Show Book')

@section('plugins.Select2',true)

@section('content_header')
    <h1>Maniak Library Software</h1>
@stop

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Book</h3>
            </div> 
            {!! Form::open(array('route' => ['books.update',$book->id],'id'=>'formBook', 'method' => 'put','enctype'=>'multipart/form-data')) !!}

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label('isbn','ISBN') !!}
                        @error('isbn')
                            {!! Form::text('isbn',$book->isbn,['class'=>'form-control  is-invalid','placeholder'=>'Enter isbn','required']) !!}
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @else
                            {!! Form::text('isbn',$book->isbn,['class'=>'form-control','placeholder'=>'Enter isbn','required']) !!}
                        @enderror
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        {!! Form::label('name','Name') !!}
                        @error('name')
                            {!! Form::text('name',$book->name,['class'=>'form-control is-invalid','placeholder'=>'Enter name','required']) !!}
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @else
                            {!! Form::text('name',$book->name,['class'=>'form-control','placeholder'=>'Enter name']) !!}
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('author','Author') !!}
                        @error('author')
                            {!! Form::text('author',$book->author,['class'=>'form-control is-invalid','placeholder'=>'Enter author','required']) !!}
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @else
                            {!! Form::text('author',$book->author,['class'=>'form-control','placeholder'=>'Enter author','required']) !!}
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('category','Category') !!}
                        @error('category')
                            {!! Form::select('category',$categories,$book->category_id,['class'=>'form-control is-invalid','placeholder'=>'seleccione una opcion...','required','id'=>'selectCategory']) !!}
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @else
                            {!! Form::select('category',$categories,$book->category_id,['class'=>'form-control','placeholder'=>'seleccione una opcion...','required','id'=>'selectCategory']) !!}
                        @enderror
                    </div>
                    <div class="form-group">
                            {!! Form::label('publication_date','Publication Date') !!}
                            @error('publicationDate')
                                {!! Form::date('publication_date',$book->publication_date,['class'=>'form-control is-invalid']) !!}
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @else
                                {!! Form::date('publication_date',$book->publication_date,['class'=>'form-control']) !!}
                            @enderror
                    </div>
                    <div class="form-group">
                            {!! Form::label('copies','Copies') !!}
                            @error('copies')
                                {!! Form::number('copies',$book->copies,['class'=>'form-control is-invalid','required']) !!}
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @else
                                {!! Form::number('copies',$book->copies,['class'=>'form-control','required']) !!}
                            @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('coverImage','Replace Cover Image') !!}
                        @error('image ')
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*" capture="camera" class="custom-file-input is-invalid">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        @else
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*" capture="camera" class="custom-file-input">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        @enderror
                    </div>
                </div>
            
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
        </div>

    </div> 
    <div class="col-6">
        <div class="card-body">
            <img class="img-fluid pad " src="{{ asset($book->image) }}" alt="Photo" width="195" height="293" >
        </div>
    </div> 
    </div> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        // $(document).ready(function() {
        //     $('#selectCategory').select2();
        //     $("#datetimepicker").datetimepicker({
        //             format:'YYYY-MM-DD HH:mm:ss'
//                    format:'DD-MM-YYYY HH:mm:ss'
                // });
        // });
        // $(function () {
        //     $.validator.setDefaults({
        //     submitHandler: function () {
        //         alert( "Form successful submitted!" );
        //     }
        //     });
        //     $('#formBook').validate({
        //     rules: {
        //         name: {
        //         required: true,
        //         },
        //         password: {
        //         required: true,
        //         minlength: 5
        //         },
        //         terms: {
        //         required: true
        //         },
        //     },
        //     messages: {
        //         name: {
        //         required: "Please enter a email address",
        //         },
        //         password: {
        //         required: "Please provide a password",
        //         minlength: "Your password must be at least 5 characters long"
        //         },
        //         terms: "Please accept our terms"
        //     },
        //     errorElement: 'span',
        //     errorPlacement: function (error, element) {
        //         error.addClass('invalid-feedback');
        //         element.closest('.form-group').append(error);
        //     },
        //     highlight: function (element, errorClass, validClass) {
        //         $(element).addClass('is-invalid');
        //     },
        //     unhighlight: function (element, errorClass, validClass) {
        //         $(element).removeClass('is-invalid');
        //     }
        //     });
        //     });
    </script>
@stop
