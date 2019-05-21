@extends('layouts.app')

@section('content')
    <div class="card card-default box-shadow">
        <div class="card-header">Employees</div>
        <div class="card-body">
            <a class="btn btn-outline-primary" style="margin-bottom:5px;" href="{{route('employees.create')}}">[+]
                Create new employee</a>
            @if(count($employees)>0)
                <table class="table-bordered table-striped" style="width:100%">
                    <tr>
                        <th style="width:20%">First name</th>
                        <th style="width:20%">Company</th>
                        <th style="width:20%">E-mail</th>
                        <th style="width:20%">Mobile number</th>
                        <th style="width:10%"></th>
                        <th style="width:10%"></th>
                    </tr>
                    @foreach($employees as $employee)
                        <tr>
                            <td><a href="{{route('employees.show', ['id' => $employee->id])}}"
                                   target="_blank">{{ $employee->first_name }} {{ $employee->last_name }}</a></td>
                            <td><a href="{{route('companies.show', ['id' => $employee->company['id']])}}"
                                   target="_blank"> {{ $employee->company['name'] }} </a></td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->mob_number }}</td>
                            <td align="center"><a class="btn btn-sm btn-info"
                                                  href="{{route('employees.edit', ['id' => $employee->id])}}">Edit</a>
                            </td>
                            <td align="center">
                                {!! Form::open(['action'=>['EmployeeController@destroy', $employee->id], 'method'=>'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="row justify-content-center" style="margin-top:5px;">{{$employees->links()}}</div>
            @else
                <div class="alert alert-warning">There are no created employees.</div>
            @endif
        </div>
    </div>
@endsection
