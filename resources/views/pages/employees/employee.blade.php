@extends('layouts.app')

@section('content')
    <div class="card card-default box-shadow">
        <div class="card-header">Employee profile</div>
        <div class="card-body">
            <b>First name of employee:</b> {{ $employee->first_name }}<br>
            <b>Last of employee:</b> {{ $employee->last_name }}<br>
            <b>E-mail of employee:</b> {{ $employee->email }}<br>
            <b>Mobile number:</b> {{ $employee->mob_number }}<br>
            <b>Company: </b> <a href="{{route('companies.show', ['id' => $employee->company['id']])}}"
                                target="_blank">{{$employee->company['name']}}</a>
        </div>
    </div>
@endsection
