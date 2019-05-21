@extends('layouts.app')

@section('content')
    <div class="card card-default box-shadow">
        <div class="card-header">Create new company</div>
        <div class="card-body">
            {!! Form::open(['action'=>'CompanyController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Company name'])}}
            </div>
            <div class="form-group">
                {{Form::label('website', 'Website')}}
                {{Form::text('website', '', ['class'=>'form-control', 'placeholder'=>'Website of company'])}}
            </div>
            <div class="form-group">
                {{Form::label('logo', 'Logo')}}
                {{Form::file('logo')}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-block btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
