@extends('layouts.master')

@section('header')
    Dashboard
@endsection

@section('description')
    This is the main page of system.
@endsection

@section('content')
    Hello, <b>{{ Auth::user()->name }}</b>! This is a dashboard of your account! You can create companies and employees.
@endsection
