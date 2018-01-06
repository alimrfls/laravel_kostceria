@extends('layout.app')
@section('content')

    <div class="container">
        <br><br>
        <br><br>
        <br><br>
        <br><br>

        <div class="alert alert-danger" style="text-align: center; border-radius: 12px">
            <h2>ACCESS DENIED</h2>
            <hr></hr>
            <h4>You are not logged in<br> Please login or create an account first</h4>
            <a href="/"><small>Back to Home</small></a>
        </div>
    </div>

    <style>
        footer{
            position: absolute;
            bottom: 0;
        }
    </style>

@endsection