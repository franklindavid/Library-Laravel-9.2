@extends('adminlte::page')

@section('title', 'Show Book')

@section('plugins.Select2',true)
@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Maniak Library Software</h1>
@stop

@section('content') 
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create New Book</h3>
    </div> 
    {!! Form::open(['route'=>'books.store','method'=>'POST','enctype'=>'multipart/form-data','id'=>'formBook']) !!}
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
                    {!! Form::text('isbn',null,['class'=>'form-control  is-invalid','placeholder'=>'Enter isbn','required']) !!}
                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                @else
                    {!! Form::text('isbn',null,['class'=>'form-control','placeholder'=>'Enter isbn','required']) !!}
                @enderror
            </div>
            <div class="form-group">
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                @error('name')
                    {!! Form::text('name',null,['class'=>'form-control is-invalid','placeholder'=>'Enter name','required']) !!}
                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                @else
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name']) !!}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('author','Author') !!}
                @error('author')
                    {!! Form::text('author',null,['class'=>'form-control is-invalid','placeholder'=>'Enter author','required']) !!}
                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                @else
                    {!! Form::text('author',null,['class'=>'form-control','placeholder'=>'Enter author','required']) !!}
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('category','Category') !!}
                @error('category')
                    {!! Form::select('category',$categories,null,['class'=>'form-control is-invalid','placeholder'=>'seleccione una opcion...','required','id'=>'selectCategory']) !!}
                    <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                @else
                    {!! Form::select('category',$categories,null,['class'=>'form-control','placeholder'=>'seleccione una opcion...','required','id'=>'selectCategory']) !!}
                @enderror
            </div>
            <div class="form-group">
                    {!! Form::label('publication_date','Publication Date') !!}
                    @error('publicationDate')
                        {!! Form::date('publication_date',null,['class'=>'form-control is-invalid']) !!}
                        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                    @else
                        {!! Form::date('publication_date',null,['class'=>'form-control']) !!}
                    @enderror
            </div>
            <div class="form-group">
                    {!! Form::label('copies','Copies') !!}
                    @error('copies')
                        {!! Form::number('copies',null,['class'=>'form-control is-invalid','required']) !!}
                        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                    @else
                        {!! Form::number('copies',null,['class'=>'form-control','required']) !!}
                    @enderror
            </div>
            <div class="form-group">
                {!! Form::label('coverImage','Cover Image') !!}
                @error('image ')
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" accept="image/*" capture="camera" class="custom-file-input is-invalid" required>
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                @else
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" accept="image/*" capture="camera" class="custom-file-input" required>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    </script>
@stop
