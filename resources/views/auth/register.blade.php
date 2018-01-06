@extends('layout.app')
@section('content')

    <div class="container" style="margin: 6%">
        <div class="col col-md-6 col-md-offset-3 well">
            <h3 style="text-align: center">Registrasi</h3>
            <hr style="border: 0; height: 1px; background-color: lightgray">
            <br>
            <form action="{{url('/doRegister')}}" method="post">
                {{csrf_field()}}

                @if ($errors->any())
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="row col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="name">Nama</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Nama saya">

                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control" placeholder="Email saya">

                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Rahasia">

                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Harus sama">
                        </div>
                    </div>
                </div>
                    <div class="form-group col-md-offset-1">
                        <input type="checkbox" id="agree_checkbox" name="agree_checkbox"> <strong>Saya setuju dengan <a href="" data-toggle="modal" data-target="#modalTerm">Syarat dan Ketentuan</a> yang berlaku</strong>
                    </div>

                    <div class="col-md-offset-4">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
            </form>

            {{--Hidden modal syarat dan ketentuan--}}
            <div class="modal fade" id="modalTerm" tabindex="-1" role="dialog" aria-labelledby="modalTermTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title" id="modalTermTitle">Syarat dan Ketentuan</h3>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>Saya bertanggung jawab penuh atas data yang saya masukan</li>
                                <li>Saya bertanggung jawab apabila ada hal yang tidak diinginkan terjadi pada akun saya</li>
                                <li>Saya bersedia untuk dihapusnya akun saya apabila melanggar ketentuan yang berlaku</li>
                                <br>
                                <li style="display: inline"><i><span style="color: red">*</span>Kost Ceria tidak pernah menyimpan password anda</i></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection