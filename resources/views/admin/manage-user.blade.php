@extends('layout.app')
@section('content')

    <div class="container">
        <br><br>
        <br>
        @if (session('alert'))
            <div class="alert alert-success animated flash">
                {{ session('alert') }}
            </div>
            <br>
        @endif
        <h1>Pengaturan Pengguna</h1>

        <br><br>
        <table class="table">
            <tr>
                <th style="text-align: center"><h4><strong>#</strong></h4></th>
                <th style="text-align: center"><h4><strong>Nama</strong></h4></th>
                <th style="text-align: center"><h4><strong>Email</strong></h4></th>
                <th style="text-align: center"><h4><strong>Role</strong></h4></th>
                <th style="text-align: center"><h4><strong>Action</strong></h4></th>
            </tr>
        <span class="hidden">{{$idx=1}}</span>
            @foreach($users as $user)
                <tr style="text-align: center">
                    <th style="text-align: center">{{$idx}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td><a href="{{url("/update-user/$user->id")}}" class="btn btn-success">Edit <span class="glyphicon glyphicon-pencil"></span></a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteAlert-{{$user->id}}">Delete <span class="glyphicon glyphicon-remove"></span></button>

                    </td>
                </tr>

                {{--Hidden modal delete--}}
                <div class="modal fade" id="modalDeleteAlert-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteAlertTitle" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="modalDeleteAlertTitle">Hapus Akun Pengguna</h3>
                            </div>
                            <div class="modal-body">
                                <h4>Apakah anda yakin ingin menghapus akun <strong>{{$user->name}}</strong> ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <a href="{{url("/delete-user/$user->id")}}"><button type="button" class="btn btn-primary">Hapus</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="hidden">{{$idx++}}</span>
            @endforeach
        </table>

        {{ $users->links() }}


    </div>


    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br>
@endsection