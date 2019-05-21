@extends('layouts.app')

@section('content')
    <div class="card card-default box-shadow">
        <div class="card-header">Edit company</div>
        <div class="card-body">
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
                {{Form::label('logo', 'Logo')}}
                <img style="height:40px" src="{{asset('storage/companies_logo/'.$company->logo)}}">
                {{Form::file('logo')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-block btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
