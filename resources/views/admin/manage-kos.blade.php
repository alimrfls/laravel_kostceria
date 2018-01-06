@extends('layout.app')
@section('content')

    <div class="container">

        <table class="table" >
            <br><br>
            <br>

            <h1>Pengaturan Kosan</h1>

            <br><br>
            <tr>
                <th style="text-align: center"><h4><strong>#</strong></h4></th>
                <th style="text-align: center"><h4><strong>Nama Kos</strong></h4></th>
                <th style="text-align: center"><h4><strong>Alamat</strong></h4></th>
                <th style="text-align: center"><h4><strong>Tipe</strong></h4></th>
                <th style="text-align: center"><h4><strong>Telepon</strong></h4></th>
                <th style="text-align: center"><h4><strong>Fasilitas</strong></h4></th>
                <th style="text-align: center"><h4><strong>Rating</strong></h4></th>
                <th style="text-align: center"><h4><strong>Harga</strong></h4></th>
                <th style="text-align: center"><h4><strong>Action</strong></h4></th>
            </tr>

            @foreach($kosan as $data)
                <tr style="text-align: center">
                    <td><img src="images/{{$data->thumbnail_kos}}" alt="{{$data->nama_kos}}" class="img-thumbnail img-responsive" style="width: 150px; height: 75px"></td>
                    <td><h5>{{$data->nama_kos}}</h5></td>
                    <td><h5>{{$data->alamat_kos}}</h5></td>
                    <td><h5>{{$data->tipe_kos}}</h5></td>
                    <td><h5>{{$data->telepon_kos}}</h5></td>
                    <td class="col-md-2"><h5>{{$data->fasilitas}}</h5></td>
                    <td><h5>
                        @if($data->rating == 0)
                            {{$data->rating}}
                        @else
                            {{number_format($data->rating/$data->total_user,1)}}
                        @endif
                        </h5>
                    </td>
                    <td ><h5>Rp {{number_format($data->harga_kos)}} /bulan</h5></td>
                    <td><a href="{{url("/update-kos/$data->id")}}" class="btn btn-success">Edit <span class="glyphicon glyphicon-pencil"></span></a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteAlert-{{$data->id}}">Delete <span class="glyphicon glyphicon-remove"></span></button>

                    </td>
                </tr>

                {{--Hidden modal delete--}}
                <div class="modal fade" id="modalDeleteAlert-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteAlertTitle" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="modalDeleteAlertTitle">Hapus Akun Pengguna</h3>
                            </div>
                            <div class="modal-body">
                                <h4>Apakah anda yakin ingin menghapus kosan dengan nama "<strong>{{$data->nama_kos}}</strong>" ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <a href="{{url("/delete-kos/$data->id")}}"><button type="button" class="btn btn-primary">Hapus</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>

        {{$kosan->links()}}

    </div>
    <br><br>
    <br><br>
    <br><br>
@endsection