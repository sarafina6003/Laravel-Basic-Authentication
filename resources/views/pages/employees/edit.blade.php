@extends('layouts.master')

@section('header')
    Edit employee
@endsection

@section('description')
    Here you can edit your created employee!
@endsection

@section('content')
            {!! Form::open(['action'=>['EmployeeController@update', $employee->id], 'method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('first_name', '*First name')}}
                {{Form::text('first_name', $employee->first_name, ['class'=>'form-control', 'placeholder'=>'First name of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('last_name', '*Last name')}}
                {{Form::text('last_name', $employee->last_name, ['class'=>'form-control', 'placeholder'=>'Last name of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email', $employee->email, ['class'=>'form-control', 'placeholder'=>'Email of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('mob_number', 'Mobile number')}}
                {{Form::text('mob_number', $employee->mob_number, ['class'=>'form-control', 'placeholder'=>'Mobile number of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('companies_id', 'Company')}}
                {{Form::select('companies_id', $companies, $employee->company['id'], ['class' => 'form-control']) }}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-block btn-primary'])}}
            {!! Form::close() !!}
@endsection
