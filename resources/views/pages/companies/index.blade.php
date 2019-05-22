@extends('layouts.master')

@section('header')
    Companies
@endsection

@section('description')
    This is companies administration page.
@endsection

@section('content')

            <a class="btn btn-outline-primary" style="margin-bottom:5px;" href="{{route('companies.create')}}">[+]
                Create new company</a>
            @if(count($companies)>0)
                <table class="table-bordered table-primary" style="width:100%">
                    <tr>
                        <th style="width:10%">Logo</th>
                        <th style="width:20%">Company name</th>
                        <th style="width:25%">Website</th>
                        <th style="width:25%">E-mail</th>
                        <th style="width:10%"></th>
                        <th style="width:10%"></th>
                    </tr>
                    @foreach($companies as $company)
                        <tr>
                            <td align="center"><img style="height:40px"
                                                    src="{{asset('storage/companies_logo/'.$company->logo)}}"></td>
                            <td><a href="{{route('companies.show', ['id' => $company->id])}}"
                                   target="_blank">{{ $company->name }}</a></td>
                            <td>{{ $company->website }}</td>
                            <td>{{ $company->email }}</td>
                            <td align="center"><a class="btn btn-sm btn-info"
                                                  href="{{route('companies.edit', ['id' => $company->id])}}">Edit</a>
                            </td>
                            <td align="center">
                                {!! Form::open(['action'=>['CompanyController@destroy', $company->id], 'method'=>'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="row justify-content-center" style="margin-top:5px;">{{$companies->links()}}</div>
            @else
                <div class="alert alert-warning">There are no created companies.</div>
            @endif

@endsection
