@extends('layout.app')
@section('content')
    <br><br>

<div class="container">

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
                <input id="nama" name="nama" class="form-control" type="text" placeholder="Masukan Nama Kos">
            </div>

                <div class="form-group">
                    <h4><label for="alamat">Alamat Kos</label></h4>
                    <input id="alamat" name="alamat" class="form-control" type="text" placeholder="Masukan Alamat Kos">
                </div>

                <div class="form-group">
                    <h4><label for="telepon">Kontak Kos</label></h4>
                    <input id="telepon" name="telepon" class="form-control" type="text" placeholder="Masukan Nomor Telepon Kos">
                </div>

                <div class="form-group">
                    <h4><label for="tipe">Tipe Kosan</label></h4>
                    <select name="tipe" id="tipe" class="form-control">
                        <option value="Putra">Khusus Putra</option>
                        <option value="Putri">Khusus Putri</option>
                        <option value="Campur">Campur</option>
                    </select>
                </div>
                <br>
                <h4><label>Fasilitas Kos</label></h4>
                <div class="row form-group">
                    <div class="col-md-3">
                        <input name="fasilitas[]"  value="AC" type="checkbox"> AC <br>
                        <input name="fasilitas[]"  value="TV" type="checkbox"> TV <br>
                        <input name="fasilitas[]"  value="Internet" type="checkbox"> Internet<br>
                        <input name="fasilitas[]"  value="Kamar Mandi" type="checkbox"> Kamar Mandi<br>
                    </div>
                    <div class="col-md-3">
                        <input name="fasilitas[]"  value="Tempat Tidur" type="checkbox"> Tempat Tidur<br>
                        <input name="fasilitas[]"  value="Lemari" type="checkbox"> Lemari<br>
                        <input name="fasilitas[]"  value="Meja dan Kursi" type="checkbox"> Meja dan Kursi<br>
                        <input name="fasilitas[]"  value="Parkiran" type="checkbox"> Parkiran<br>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <h4><label for="desc">Deskripsi Kos</label></h4>
                    <textarea id="desc" name="desc" class="form-control" placeholder="Masukan Deskripsi Kos" rows="7"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <h4><label for="harga">Harga Kos</label></h4>
                    <input id="harga" name="harga" class="form-control" type="number" placeholder="Harga Kos">
                </div>
                <br><br>
                <div class="form-group">
                    <h4><label for="coordinate">Koordinat Kos</label></h4>
                    <small>koordinat di google maps (contoh: -6.2018877,106.7823911)</small>
                    <input id="coordinate" name="coordinate" class="form-control" type="text">
                </div>

                <br><br>
                    <div class="form-group col-md-offset-4">
                        <h4><label for="fotokos">Upload Foto Kos</label></h4>
                        <input multiple type="file" accept="image/jpeg" id="fotokos" name="fotokos[]" class="form-control-file" required>
                        <small class="text-muted"> <span style="color: red">*</span>Dapat memilih lebih dari 1 foto <strong>(minimal 1 foto)</strong> <br></small>
                    </div>
                <br><br>
                <div class="form-group">
                    <label for="setuju"></label>
                    <strong>
                        <input type="checkbox" id="setuju" name="setuju" required>Saya setuju dengan <a href="" data-toggle="modal" data-target="#modalUploadTerm">syarat dan ketentuan</a> yang berlaku
                    </strong>
                </div>
            </div>
         <br>
        <div class="row">
            <div class="col-xs-6"><button type="submit" class="btn btn-success col-xs-12">Add</button></div>
            <div class="col-xs-6"><a href="{{url('/')}}"><button type="button" class="btn btn-danger col-xs-12">Cancel</button></a></div>
        </div>
    </form>

</div>
    <br><br>

    {{--Hidden modal syarat dan ketentuan--}}
    <div class="modal fade" id="modalUploadTerm" tabindex="-1" role="dialog" aria-labelledby="modalUploadTermTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="modalUploadTermTitle">Syarat dan Ketentuan Menambah Data Kosan</h3>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Data yang dimasukan harus valid</li>
                        <li>Admin bersedia merubah data kos apabila data tidak sesuai</li>
                        <li>Admin bertanggung jawab penuh terhadap kesalahan yang terjadi</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @endsection