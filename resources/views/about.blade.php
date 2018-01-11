@extends('layout.app')
@section('content')

    <style>
        .sosmed{
            opacity: 0.7;
        }

        .sosmed:hover{
            opacity: 1;
        }

    </style>

            <div id="overview">
                <div class="container text-center" style="margin-top: 120px; margin-bottom: 180px">
                    <h1>Kost Ceria</h1>
                    <img src="/images/misc/kostceria.ico" alt="icon" style="width: 100px;">
                    <h4><i>website review kost yang bikin kamu ceria</i></h4>
                    <br>
                    <br>
                    <br>
                    <p>KostCeria adalah website yang bertujuan memudahkan mahasiswa(i), karyawan dan atau orang yang ingin mencari kosan disekitar BINUS untuk mendapatkan gambaran / review dari kosan yang diinginkan.
                        Dibuat pada tahun 2017 di Jakarta, KostCeria diharapkan menjadi website review dan atau pencarian kosan terbaik di Indonesia.
                    </p>
                </div>
            </div>

    <hr style="border: 0; height: 2px; background-color: darkgray">

    <div id="visimisi">
        <div class="container text-center" style="margin-top: 150px; margin-bottom: 270px">
            <div class="row">
                <div class="col-md-6">
                    <h2>VISI <span class="text-muted">KAMI</span></h2>
                    <hr style="border: 0; height: 2px; background-color: darkgray">
                    <br>
                    <br>
                    <h3><i><q>Menjadi website review kost terlengkap dan terbesar seindonesia.</q></i></h3>
                </div>

                <div class="col-md-6">
                    <h2>MISI <span class="text-muted">KAMI</span></h2>
                    <hr style="border: 0; height: 2px; background-color: darkgray">
                    <br>
                    <br>
                    <ul>
                        <li><h4>Mengembangkan website sesuai perkembangan zaman.</h4></li>
                        <li><h4>Menyediakan informasi kosan sesuai dengan yang ada.</h4></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


            <hr style="border: 0; height: 2px; background-color: darkgray">

            <div id="tim">
                <div class="container text-center" style="margin-top: 120px; margin-bottom: 110px">
                    <h1>Tim Kost Ceria</h1>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-4" style="margin-top: 30px; margin-bottom: 50px">
                            <img class="img-thumbnail" src="/images/misc/deny.jpg" alt="Generic placeholder image" width="140" height="140" style="border-radius: 150px">
                            <h2><b>Deny Rosadi</b></h2>
                            <h4 class="text-muted"><i>Founder Kost Ceria</i></h4>
                            <br>
                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                            <br>
                            <a href="https://www.linkedin.com/in/deny-rosadi-b5147a150/" target="_blank"><button class="btn btn-primary" href="#" role="button">View Profile &raquo;</button></a>
                        </div>

                        <div class="col-lg-4" style="margin-bottom: 50px">
                            <img class="img-thumbnail" src="/images/misc/alim.jpg" alt="Generic placeholder image" width="140" height="140" style="border-radius: 150px">
                            <h2><b>Alim Rafli</b></h2>
                            <h4 class="text-muted"><i>Founder Kost Ceria</i></h4>
                            <br>
                            <p><q>I believe there are no secrets to success. It depends on the result of your preparation, your sacrifice, and how you learn from failure</q></p>
                            <br>
                            <a href="https://www.linkedin.com/in/alimrafli/" target="_blank"><button class="btn btn-primary" role="button">View Profile &raquo;</button></a>
                        </div>

                        <div class="col-lg-4" style="margin-top: 30px;margin-bottom: 50px">
                            <img class="img-thumbnail" src="/images/misc/yusuf.jpg" alt="Generic placeholder image" width="140" height="140" style="border-radius: 150px">
                            <h2><b>Yusuf Rifqi</b></h2>
                            <h4 class="text-muted"><i>Founder Kost Ceria</i></h4>
                            <br>
                            <h5><q>I am a very hard working, detail oriented, and enthusiastic person who is always interested in learning new things.</q></h5>
                            <br>
                            <a href="https://www.linkedin.com/in/yusuf-rifqi-2847a1141/" target="_blank"><button class="btn btn-primary" role="button">View Profile &raquo;</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border: 0; height: 2px; background-color: darkgray">

            <div id="contact">
                <div class="container text-center" style="margin-top: 150px; margin-bottom: 180px">
                    <h1>Hubungi Kami</h1>
                    <h4><i>melalui sosial media dibawah ini</i></h4>
                    <br>
                    <div class="row col-md-offset-1">
                        <div class="col-md-2">
                            <a href="d#"><img class="sosmed" src="/images/misc/fb.png" alt="facebook"></a>
                        </div>
                        <div class="col-md-2">
                            <a href="#"><img class="sosmed" src="/images/misc/ig.png" alt="instagram"></a>
                        </div>
                        <div class="col-md-2">
                            <a href="#"><img class="sosmed" src="/images/misc/wa.png" alt="whatsapp"></a>
                        </div>
                        <div class="col-md-2">
                            <a href="#"><img class="sosmed" src="/images/misc/twitter.png" alt="twitter"></a>
                        </div>
                        <div class="col-md-2">
                            <a href="#"><img class="sosmed" src="/images/misc/mail.png" alt="mail"></a>
                        </div>
                    </div>
                </div>
            </div>


    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    <script>
        window.sr = ScrollReveal({ duration: 1500 });
        sr.reveal('#overview');
        sr.reveal('#visimisi');
        sr.reveal('#tim');
        sr.reveal('#contact');
    </script>
@endsection