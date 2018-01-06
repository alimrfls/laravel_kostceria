@extends('layout.app')
@section('content')


    <div class="container" style="margin: 6%">
        <div class="col col-md-6 col-md-offset-4 well">
            <h3 style="text-align: center">Edit Data Pengguna</h3>
            <hr style="border: 0; height: 1px; background-color: lightgray">
            <br>
            <form action="" method="post">
                {{csrf_field()}}

                @if ($errors->any())
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{$users->name}}">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input id="email" name="email" type="email" class="form-control" value="{{$users->email}}">
                </div>

                <div class="form-group">
                    <label for="role">Role: </label>
                    <select name="role" id="role" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="col-md-offset-4">
                    <a href="{{url('/manage-user')}}"><button type="button" class="btn btn-danger">Batal</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>



@endsection