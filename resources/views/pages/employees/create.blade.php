@extends('layouts.master')

@section('header')
    @lang('employees.header_create')
@endsection

@section('description')
    @lang('employees.description_create')
@endsection

@section('content')
            {!! Form::open(['action'=>'EmployeeController@store', 'method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('first_name', '*'.__('employees.first_name'))}}
                {{Form::text('first_name', '', ['class'=>'form-control', 'placeholder'=>'First name of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('last_name', '*'.__('employees.last_name'))}}
                {{Form::text('last_name', '', ['class'=>'form-control', 'placeholder'=>'Last name of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', __('employees.email'))}}
                {{Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Email of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('mob_number', __('employees.mob_number'))}}
                {{Form::text('mob_number', '', ['class'=>'form-control', 'placeholder'=>'Mobile number of employee'])}}
            </div>
            <div class="form-group">
                {{Form::label('companies_id', __('employees.company'))}}
                {{Form::select('companies_id', $companies, -1, ['class' => 'form-control']) }}
            </div>
            {{Form::submit(__('employees.submit'), ['class'=>'btn btn-block btn-primary'])}}
            {!! Form::close() !!}
@endsection
