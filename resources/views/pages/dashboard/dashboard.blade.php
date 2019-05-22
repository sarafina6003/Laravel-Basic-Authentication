@extends('layouts.master')

@section('header')
    @lang('dashboard.dashboard_name')
@endsection

@section('description')
    @lang('dashboard.dashboard_description')
@endsection

@section('content')
    @lang('dashboard.hello'), <b>{{ Auth::user()->name }}</b>! @lang('dashboard.longer_description')
@endsection
