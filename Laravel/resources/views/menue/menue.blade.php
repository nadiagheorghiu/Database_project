<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proiect PBD</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/style.css">
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="/public/file.js"></script>
    <style>
        .active {
            color: red;
        }
    </style>
</head>

<header>
    @include('menue.header')
</header>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('add') }}">Add Info</a>
    <a href="{{ route('index') }}">Tasks</a>
    <a href="{{ route('studenti') }}">Tabel Studenti</a>
    <a href="#">Clients</a>
    <a href="#">Tabel Ordonat</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>

@yield('content')

<footer>
    @include('menue.footer')
</footer>