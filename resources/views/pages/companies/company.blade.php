@extends('layouts.master')

@section('header')
    Company profile
@endsection

@section('content')
            <table class="table-bordered table-primary" style="width:100%">
                <tr>
                    <td rowspan="2" align="center"><img src="{{asset('storage/companies_logo/'.$company->logo)}}"
                                                        style="max-height:100px;"></td>
                    <td colspan="2" style="width:80%"><b>{{$company->name}}</b></td>
                </tr>
                <tr>
                    <td>
                        Website: {{ $company->website }}
                    </td>
                    <td>
                        E-mail: {{ $company->email }}
                    </td>
                </tr>
            </table>
            <hr><b>Employees:</b><br>
            @foreach($company->employees as $employee)
                <a href="{{route('employees.show', ['id' => $employee['id']])}}"
                   target="_blank">{{ $employee['first_name'] }} {{ $employee['last_name'] }}</a> <br>
            @endforeach
@endsection
