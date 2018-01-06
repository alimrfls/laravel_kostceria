@extends('layout.app')
@section('content')

    <div class="container">
        <br><br>
        <br><br>
        <br><br>
        <br><br>

        <div class="alert alert-danger" style="text-align: center; border-radius: 12px">
            <h1>ACCESS DENIED</h1>
            <h3>You are not authorized to access this page</h3>
            <a href="/"><small>Back To Home</small></a>
        </div>
    </div>

    <style>
        footer{
            position: absolute;
            bottom: 0;
        }
    </style>

@endsection