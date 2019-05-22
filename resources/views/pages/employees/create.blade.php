@extends('layouts.master')

@section('header')
    Create new employee
@endsection

@section('description')
    Here you can create new employee!
@endsection

@section('content')
            {!! Form::open(['action'=>'EmployeeController@store', 'method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('first_name', '*First name')}}
                {{Form::text('first_name', '', ['class'=>'form-control', 'placeholder'=>'First name of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('last_name', '*Last name')}}
                {{Form::text('last_name', '', ['class'=>'form-control', 'placeholder'=>'Last name of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Email of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('mob_number', 'Mobile number')}}
                {{Form::text('mob_number', '', ['class'=>'form-control', 'placeholder'=>'Mobile number of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('companies_id', 'Company')}}
                {{Form::select('companies_id', $companies, -1, ['class' => 'form-control']) }}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-block btn-primary'])}}
            {!! Form::close() !!}
@endsection
