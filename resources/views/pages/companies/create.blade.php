@extends('layouts.master')

@section('header')
    Create new company
@endsection

@section('description')
    Here you can create new company!
@endsection

@section('content')
            {!! Form::open(['action'=>'CompanyController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', '*Name')}}
                {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Company name'])}}
            </div>
            <div class="form-group">
                {{Form::label('website', 'Website')}}
                {{Form::text('website', '', ['class'=>'form-control', 'placeholder'=>'Website of company'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Email of company'])}}
            </div>
            <div class="form-group">
                {{Form::label('logo', 'Logo')}}
                {{Form::file('logo')}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-block btn-primary'])}}
            {!! Form::close() !!}
@endsection
