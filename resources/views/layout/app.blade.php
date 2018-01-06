<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kost Ceria</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <link rel="stylesheet"  type="text/css" href="/css/animate.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Kost<i class="glyphicon glyphicon-home"></i>Ceria</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            @if(Auth::check())
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/">Home</a></li>
                    @if(Auth::user()->role == "admin")
                        <li><a href="{{url('/manage-user')}}">Manage User <i class="glyphicon glyphicon-pencil"></i></a></li>
                        <li><a href="{{url('/manage-kos')}}">Manage Kosan <i class="glyphicon glyphicon-pencil"></i></a></li>
                        <li><a href="{{url('/tambah-kos')}}">Tambah kosan <i class="glyphicon glyphicon-plus"></i></a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="infinite animated jello" href="">Hello, {{Auth::user()->name}} <span class="glyphicon glyphicon-user"></span></a></li>
                    <li><a href="{{url('/logout')}}">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/">Home</a></li>
                </ul>>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/register')}}"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
                    <li><a href="" data-toggle="modal" data-target="#modalLogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>
<div style="height:51px;" class="container-fluid"></div>

{{--Hidden Modal untuk form login--}}
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="modalLoginTitle">Login</h3>
            </div>
            <form action="{{url('/doLogin')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Masukan email mu di sini">
                    </div>

                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Masukan password mu di sini">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>


{{--Isi konten--}}
@yield('content')


<footer class="container-fluid text-center">
    <p>Copyright &copy; KostCeria <span id="lifetime"></span></p>
    <script type="text/javascript">
        var year=(new Date().getFullYear());
        if(year==2017 ? $("#lifetime").html(year) : $("#lifetime").html("2017 - "+year));

        function kostceriaInit(){
            showFlag.checked=false;
        }
        //kostceriaInit();
    </script>
</footer>
</body>
</html>