{{--Tampilan detail kosan--}}
@extends('layout.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <br><br>
    <br>

    <style>
        #slidercontainer {
            width: 35%; /* Width of the outside container */
        }

        /* slider rating */
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }


        /* efek hover mouse ke slider rating */
        .slider:hover {
            opacity: 1; /*ketransparanan jadi utuh*/
        }

        /* handle slider rating */
        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: orange;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: orange;
            cursor: pointer;
        }

        /*Tombol yang non aktif*/
        .butt{
            background-color: lightgrey;
        }

        /*Tombol yang aktif*/
        .act{
            background-color: limegreen;
            color: white;
        }


    </style>

    @if (session('alert'))
        <div class="container">
            <div class="alert alert-success animated flash">
                {{ session('alert') }}
            </div>
        </div>
        <br>
    @endif

    <div class="container animated slideInUp">

        <div style="text-align: center">
            @if ($errors->any())
                <div class="form-group">
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                </div>
            @endif
        </div>
        @foreach($res as $show)
            <div class="row">
                <div class="col-md-6">
                    <h1>{{$show->nama_kos}}</h1>
                    <h5>{{$show->alamat_kos}}</h5>
                    <h6 class="text-muted"><span class="glyphicon glyphicon-phone"></span> {{$show->telepon_kos}}</h6>
                </div>
                <div class="col-md-4" style="float: right">
                    <br>
                    <h3>Harga:</h3>
                    <h4>Rp {{number_format($show->harga_kos)}} / bulan <span class="glyphicon glyphicon-tags"></span></h4>
                </div>
            </div>

            <hr style="border: 0; height: 1px; background-color: darkgray">

            <div class="container">
                <br>
                @if($show->rating == 0)
                    <span class="hidden">{{$rate = $show->rating}}</span>
                @else
                    <span class="hidden">{{$rate = intval($show->rating/$show->total_user)}}</span>
                @endif
                <div class="row">
                    <div class="col-lg-4">
                        <h2><i>Rating
                                <span
                                @if($rate < 2)
                                 style="color: darkred"
                                    @elseif($rate < 4)
                                        style="color: darkorange"
                                    @else
                                        style="color: limegreen"
                                    @endif
                                >
                                    @if($show->total_user == 0)
                                        {{$show->rating}}
                                    @else
                                        {{number_format($show->rating/$show->total_user,1)}}
                                    @endif
                                </span></i> &nbsp;
                            @for($i=0;$i<5;$i++)
                                @if($rate>0)
                                    <span class="fa fa-star checked"></span>
                                    <span class="hidden">{{$rate=$rate-1}}</span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor
                            <h4 class="text-muted"><i> dari {{$show->total_user}} penilaian pengguna</i></h4>
                        </h2>
                        @if($show->total_user == 0)
                            @if(Auth::check())
                                <h5>Belum ada penilaian untuk kos ini. <br>Jadi yang pertama untuk memberikan rating kosan ini.</h5>
                            @else
                                <h5>Belum ada penilaian untuk kos ini. <a href="{{url('/login')}}">Login</a> untuk menjadi yang pertama!</h5>
                                <small class="text-muted">Belum punya akun? <a href="{{url('/register')}}">Daftar</a> sekarang!</small>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <br>

            {{--Carousel Foto kos--}}
            <div class="col-md-offset-2">
                @for($i=1; $i<=$show->total_foto_kos;$i++)
                    <img class="carous img-responsive img-thumbnail animated zoomIn" src="/images/daftar_kos/{{str_replace(' ','_',$show->nama_kos)}}/{{str_replace('_1',"_$i",$show->thumbnail_kos)}}" alt="{{str_replace('_1',"_$i",$show->thumbnail_kos)}}" style="width: 80%; height: 350px">
                @endfor
            </div>

            <br>
            <br>
            <br>

            <div class="container">
                <div class="btn-group btn-group-justified">
                    <a id="btn1" onclick="changeView(this.id)" class="butt act btn" style="border-right: solid darkgray 1px;border-bottom-left-radius: 10px; border-top-left-radius: 10px"><h3>Kos Review</h3></a>
                    <a id="btn2" onclick="changeView(this.id)" class="butt btn" style="border-bottom-right-radius: 10px; border-top-right-radius: 10px"><h3>Kos Details</h3></a>
                </div>
                <div style="border-radius: 12px;border: solid lightgrey 2px;">
                    <div id="review" style="padding: 20px;" class="animated pulse">
                        @if(Auth::check())
                            @if(Auth::user()->role =='user')
                                <div class="well">
                                    <form action="{{url("/tambah-rating/$show->id")}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group col-md-12">
                                            <label for="rev1">Tulis Pendapat Anda Tentang Kos ini</label>
                                            <textarea class="form-control" name="review" id="rev1" cols="115" rows="4"></textarea>
                                        </div>

                                        <br>
                                        <div id="slidercontainer" class="form-group col-md-4">
                                            <label for="myRange">Berikan Penilaian untuk Kosan ini</label>
                                            <input type="range" min="1" max="5" class="slider" name="rating-val" id="myRange">
                                            <br>
                                            <h5>Beri rating: &nbsp; <span id="rate"></span></h5>
                                        </div>

                                        <button type="submit" class="btn btn-success col-md-offset-10">Tambahkan Review</button>
                                    </form>
                                </div>
                            @endif
                        @else
                            <div class="well">
                                <h4>Login untuk memberikan penilaian</h4>
                            </div>
                        @endif

                            <br>
                            @if($show->total_user == 0)
                                <h3 style="text-align: center">Belum ada review untuk kos ini</h3>
                            @else
                                <h2>Reviews</h2>
                                <hr style="border: 0; height: 1px;background-color: lightgray">
                                @foreach($rev as $revs)
                                    <div class=" well" style="border-radius: 20px">
                                        @if(Auth::check())
                                            @if(Auth::user()->role =='admin')
                                                <a href="{{url("/delete-review/$revs->id")}}" style="color: red"><span class="glyphicon glyphicon-remove" style="float: right"></span></a>
                                                <br>
                                            @endif
                                        @endif
                                        <div class="row">
                                            <h3 class="col-md-10">{{$revs->nama_user}}</h3>
                                            <small class="col-md-2"><i>{{$revs->created_at}}</i></small>
                                        </div>
                                            <hr style="border: 0; height: 1px;background-color: lightgray">
                                            <h5><i><q>{{$revs->review_data}}</q></i></h5>
                                            <br>
                                            <small>{{$revs->nama_user}} memberi rating {{$revs->user_rate}} untuk {{$show->nama_kos}}</small>
                                    </div>
                                @endforeach
                                {{$rev->links()}}
                            @endif
                    </div>

                    <div id="details" style="display: none; padding: 20px" class="animated pulse">
                        {{--Menampilkan Deskripsi kos--}}
                        <div>
                            <h3><strong>Deskripsi</strong></h3>
                            <hr style="border: 0; height: 1px; background-color: lightgrey">
                            <h4>{{$show->desc_kos}}</h4>
                        </div>

                        <br>
                        <br>

                            {{--Menampilkan fasilitas kos yang tersedia--}}
                            <div>
                                <h3><strong>Fasilitas</strong></h3>
                                <hr style="border: 0; height: 1px; background-color: lightgrey">
                                @foreach(explode(", ",$show->fasilitas) as $fas) {{--Kebalikan dari implode--}}
                                    <h5 class="col-md-2"><span class="glyphicon glyphicon-ok" style="color: #00cc00"></span> {{$fas}}</h5>
                                @endforeach
                            </div>

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                            {{--Menampilkan Tipe kos--}}
                        <div>
                            <h3><strong>Tipe Kosan</strong></h3>
                            <hr style="border: 0; height: 1px; background-color: lightgrey">

                            @if($show->tipe_kos == "Putra")
                                <h4><span style="color: #2a88bd" class="glyphicon glyphicon-user"></span>&nbsp;{{$show->tipe_kos}}</h4>
                            @elseif($show->tipe_kos == "Putri")
                                <h4><span style="color: hotpink" class="glyphicon glyphicon-user"></span>&nbsp;{{$show->tipe_kos}}</h4>
                            @else
                                <h4><span style="color: #2a88bd" class="glyphicon glyphicon-user"></span><span style="color: hotpink" class="glyphicon glyphicon-user"></span>&nbsp;{{$show->tipe_kos}}</h4>
                            @endif
                        </div>

                        <br>
                        <br>
                        <br>

                        <div>
                            <h3><strong>Denah Kos</strong></h3>
                            <hr style="border: 0; height: 1px; background-color: lightgrey">
                            <h6><i><span style="color:red ;">*</span>Denah berikut adalah denah kos dari kampus Binus Anggrek Kemanggisan</i></h6>
                            <br>
                            <iframe src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyB_pL3Lg0o0FZOsMgf6Ph76wqiZTGI3mmg&origin=-6.2018877,106.7823911&destination={{$show->coordinate_kos}}" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <br>
    <br>

    <script>
        //Script untuk slider nilai kos
        var slider = document.getElementById("myRange");
        var output = document.getElementById("rate");
        output.innerHTML = slider.value; // Menampilkan default slider value

        // Update slider value yang ada (setiap handle slider di geser)
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>

    <script>
        //Script untuk carousel gambar kos
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("carous");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 5000); // Change image every 2 seconds
        }
    </script>


    <script>
        //Function Untuk memunculkan div review atau overview
        function changeView(id) {
            if (id == 'btn1'){
                document.getElementById(id).style.backgroundColor = 'limegreen'
                document.getElementById(id).style.color = 'white'
                document.getElementById('btn2').style.color = 'black'
                document.getElementById('btn2').style.backgroundColor = 'lightgray'

                document.getElementById('details').style.display = 'none'
                document.getElementById('review').style.display = 'block'


            }else{

                document.getElementById(id).style.backgroundColor = 'limegreen'
                document.getElementById(id).style.color = 'white'
                document.getElementById('btn1').style.color = 'black'
                document.getElementById('btn1').style.backgroundColor = 'lightgray'

                document.getElementById('review').style.display = 'none'
                document.getElementById('details').style.display = 'block'

            }
        }

    </script>

@endsection