@extends('layout.app')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <form method="post" action="{{url('/search')}}">
        {{csrf_field()}}
        <div class="container-fluid jumbotron" style="padding:0;margin-top:0">
            <div class="container-fluid jumbotron text-center banner">
                <h1 style="color:#fff;">Cari Kos Murah Sekitar Binus?</h1>
                <div>
                    <input type="text" name="katakunci" id="search" placeholder="Cari disini" required><br />
                    <div style="clear:both;"></div><br />
                    <div class="col-xs-6 col-xs-offset-3"><button type="submit" style="border-radius: 20px" class="col-xs-12 btn btn-success">Search</button></div>
                </div>
            </div>
        </div>
    </form>

    <div class="container-fluid bg-3 text-center animated jackInTheBox">
        <h2><strong>Daftar Kos Dekat Binus</strong></h2>
        <hr style="background-color: darkgray; height: 1px; border: 0">
        <br>

        {{-- Menampilkan setiap data kos yang ada--}}
            <div class="row col-md-offset-1">
                @foreach($koslist as $kos)
                    <a href="{{url("/view/$kos->id")}}">
                        <div class="col col-md-3 well animated swing" style="margin-bottom: 15px; margin-left: 32px; margin-right: 32px; height: 340px">
                            <h3>{{$kos->nama_kos}}</h3>
                            {{--Menentukan apakah rating 0 atau tidak--}}
                            @if($kos->rating == 0)
                                <span class="hidden">{{$rate = $kos->rating}}</span>
                            @else
                                <span class="hidden">{{$rate = intval($kos->rating/$kos->total_user)}}</span>
                            @endif
                            <h5>
                                {{--Menampilkan Gambar bintang sesuai rating--}}
                                @for($i=0;$i<5;$i++)
                                    @if($rate>0)
                                        <span class="fa fa-star checked"></span>
                                        <span class="hidden">{{$rate=$rate-1}}</span>
                                    @else
                                        <span class="fa fa-star"></span>
                                    @endif
                                @endfor
                                {{--Menampilkan angka rating--}}
                                <i>
                                    <span>
                                    @if($kos->total_user == 0)
                                            {{$kos->rating}}
                                        @else
                                            {{number_format($kos->rating/$kos->total_user,1)}}
                                        @endif
                                </span></i> &nbsp;
                            </h5>
                            {{--Thumbnail kos pada home page--}}
                            <img src="images/{{$kos->thumbnail_kos}}" class="img-thumbnail" style="border-radius: 10px; width:100%; height:180px" alt="Image">
                    </div>
                    </a>
                @endforeach
            </div>
        {{ $koslist->links() }}

    </div><br>
@endsection