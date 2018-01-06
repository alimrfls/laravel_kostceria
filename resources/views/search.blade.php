@extends('layout.app')
@section('content')
    <br>
    <br>
    <br>
    <div class="container">

        @if(sizeof($result)<1)
            <h2 style="text-align: center">There is no such "{{$key}}"</h2>
        @else
            <h2 style="text-align: center">Showing {{sizeof($result)}} result for "{{$key}}"</h2>
        @endif

        <br>
        <br>
        <table class="table">
            @foreach($result as $res)
                <tr>
                    <td><img src="images/{{$res->thumbnail_kos}}" alt="{{$res->nama_kos}}" class="img-thumbnail img-responsive" style="width: 200px; height: 100px"></td>
                    <td><br><a href="{{url("/view/$res->id")}}"><h3>{{$res->nama_kos}}</h3></a></td>
                    <td style="text-align: center"><br><br>Rp {{number_format($res->harga_kos)}} /bulan</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
