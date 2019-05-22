@extends('layouts.master')

@section('header')
    Employee profile
@endsection


@section('content')
            <b>First name of employee:</b> {{ $employee->first_name }}<br>
            <b>Last of employee:</b> {{ $employee->last_name }}<br>
            <b>E-mail of employee:</b> {{ $employee->email }}<br>
            <b>Mobile number:</b> {{ $employee->mob_number }}<br>
            <b>Company: </b> <a href="{{route('companies.show', ['id' => $employee->company['id']])}}"
                                target="_blank">{{$employee->company['name']}}</a>
@endsection
