@extends('layouts.master')

@section('header')
    Edit company
@endsection

@section('description')
    Here you can edit your created company!
@endsection

@section('content')
            {!! Form::open(['action'=>['CompanyController@update', $company->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $company->name, ['class'=>'form-control', 'placeholder'=>'Company name'])}}
            </div>
            <div class="form-group">
                {{Form::label('website', 'Website')}}
                {{Form::text('website', $company->website, ['class'=>'form-control', 'placeholder'=>'Website of company'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'E-mail:')}}
                {{Form::text('email', $company->email, ['class'=>'form-control', 'placeholder'=>'E-mail of company'])}}
            </div>
            <div class="form-group">
                {{Form::label('logo', 'Logo')}}
                <img style="height:40px" src="{{asset('storage/companies_logo/'.$company->logo)}}">
                {{Form::file('logo')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-block btn-primary'])}}
            {!! Form::close() !!}
@endsection
