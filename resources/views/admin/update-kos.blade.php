@extends('layout.app')
@section('content')
<div class="container">

    <div class="col col-md-8 col-md-offset-2 well">
        <h3 style="text-align: center">Edit Data Kosan</h3>
        <hr style="border: 0; height: 1px; background-color: lightgray">
        <br>
        <form action="" method="post" enctype="multipart/form-data" class=" col-md-8 col-md-offset-2">

            {{csrf_field()}}

            <div class="row">

                @if ($errors->any())
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif

                    <div class="form-group">
                        <h4><label for="nama">Nama Kos</label></h4>
                        <input id="nama" name="nama" class="form-control" type="text" value="{{$kos->nama_kos}}">
                    </div>

                    <div class="form-group">
                        <h4><label for="alamat">Alamat Kos</label></h4>
                        <input id="alamat" name="alamat" class="form-control" type="text" value="{{$kos->alamat_kos}}">
                    </div>

                    <div class="form-group">
                        <h4><label for="telepon">Kontak Kos</label></h4>
                        <input id="telepon" name="telepon" class="form-control" type="text" value="{{$kos->telepon_kos}}">
                    </div>

                    <div class="form-group">
                        <h4><label for="tipe">Tipe Kosan</label></h4>
                        <select name="tipe" id="tipe" class="form-control">
                            <option value="{{$kos->tipe_kos}}">{{$kos->tipe_kos}}</option>
                            @if($kos->tipe_kos == "Putra")
                                <option value="Putri">Putri</option>
                                <option value="Campur">Campur</option>
                            @elseif($kos->tipe_kos == "Putri")
                                <option value="Putra">Putra</option>
                                <option value="Campur">Campur</option>
                            @else
                                <option value="Putra">Putra</option>
                                <option value="Putri">Putri</option>
                            @endif
                        </select>
                    </div>
                    <br>
                    <h4><label>Fasilitas Kos <br><small><span style="color: red">*</span>Kosongkan jika tidak ada perubahan</small></label></h4>
                    <div class="row form-group">

                        <div class="col-md-4">
                            <input name="fasilitas[]"  value="AC" type="checkbox"> AC <br>
                            <input name="fasilitas[]"  value="TV" type="checkbox"> TV <br>
                            <input name="fasilitas[]"  value="Internet" type="checkbox"> Internet<br>
                            <input name="fasilitas[]"  value="Kamar Mandi" type="checkbox"> Kamar Mandi<br>
                        </div>
                        <div class="col-md-4"><input name="fasilitas[]"  value="Tempat Tidur" type="checkbox"> Tempat Tidur<br>
                            <input name="fasilitas[]"  value="Lemari" type="checkbox"> Lemari<br>
                            <input name="fasilitas[]"  value="Meja dan Kursi" type="checkbox"> Meja dan Kursi<br>
                            <input name="fasilitas[]"  value="Parkiran" type="checkbox"> Parkiran<br>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <h4><label for="desc">Deskripsi Kos</label></h4>
                        <textarea id="desc" name="desc" class="form-control" rows="7">{{$kos->desc_kos}}</textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <h4><label for="harga">Harga Kos</label></h4>
                        <input id="harga" name="harga" class="form-control" type="number" value="{{$kos->harga_kos}}">
                    </div>

                    <div class="form-group">
                        <h4><label for="coordinate">Koordinat Kos</label></h4>
                        <input id="coordinate" name="coordinate" class="form-control" type="text" value="{{$kos->coordinate_kos}}">
                    </div>

                        <br><br>
                        <div class="row">
                            @for($i=1;$i<=$kos->total_foto_kos;$i++)
                                <div class="col-md-4">
                                    <a style="float: right" href="{{url("/delete-photo/$kos->id/$i")}}"><span class="glyphicon glyphicon-remove"></span></a>
                                    <img class="img-responsive img-thumbnail" src="/images/daftar_kos/{{str_replace(' ','_',$kos->nama_kos)}}/{{str_replace('_1',"_$i",$kos->thumbnail_kos)}}" alt="{{str_replace('_1',"_$i",$kos->thumbnail_kos)}}" style="width: 200px; height: 100px">
                                </div>
                            @endfor
                        </div>
                        <br><br>
                    <div class="form-group col-md-offset-4">
                        <h4><label for="fotokos">Upload Foto Kos</label></h4>
                        <input multiple type="file" accept="image/jpeg" id="fotokos" name="fotokos[]" class="form-control-file">
                        <small class="text-muted"> <span style="color: red">*</span>Dapat memilih lebih dari 1 foto <strong>(minimal 1 foto)</strong> <br></small>
                    </div>
                    <br><br>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-6"><button type="submit" class="btn btn-success col-xs-12">Update</button></div>
                <div class="col-xs-6"><a href="{{url("/manage-kos")}}"><button type="button" class="btn btn-danger col-xs-12">Batal</button></a></div>
            </div>
        </form>
    </div>
</div>
@endsection