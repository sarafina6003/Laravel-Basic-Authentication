@extends('layouts.app')

@section('content')
            <div class="card card-default box-shadow">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    Hello, <b>{{ Auth::user()->name }}</b>! This is a dashboard of your account!
                </div>
            </div>
@endsection
