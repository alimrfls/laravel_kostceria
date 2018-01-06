@extends('layout.app')
@section('content')

    <div class="container" style="margin: 6%">

        @if (session('alert'))
            <div class="alert alert-success animated flash">
                {{ session('alert') }}
            </div>
            <br>
        @endif

            @if (session('wrong_alert'))
                <div class="container animated shake">
                    <div class="alert alert-danger">
                        {{ session('wrong_alert')}}
                    </div>
                </div>
                <br>
            @endif

        <div class="col col-md-4 col-md-offset-4 well">
            <h3 style="text-align: center">Login</h3>
            <hr style="border: 0; height: 1px; background-color: lightgray">
            <br>
            <form action="{{url('/doLogin')}}" method="post">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="password">
                </div>

                <div class="col-md-offset-7">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

            </form>
        </div>
    </div>

    <style>
        footer{
            position: absolute;
            bottom: 0;
        }
    </style>

@endsection