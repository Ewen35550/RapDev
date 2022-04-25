<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('boxicons/css/boxicons.min.css') }}">
    <title>RapDev</title>
</head>
<body>

    <header>
        <div class="btn_nav">
            <i class="fa-solid fa-bars" id="btnNav"></i>
        </div>

        <div class="link_profil" id="btnProfil">
            <span class="btn_profil"><img src="{{ asset('img/default_user.png') }}" alt="Image User" id="image_user"></span>
            <div class="menu_profil">
                <ul>
                    <a href="">
                        <li><i class="fa-solid fa-user"></i> Profil</li>
                    </a>
                    <hr>
                    <a href="">
                        <li><i class="fa-solid fa-arrow-right-from-bracket"></i> Deconnexion</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>

    <nav class="menu_slide">
        <ul>
            <a href="{{ route('home') }}">
                <li><i class="fa-solid fa-house"></i> Home</li>
            </a>
            <a href="{{ route('admin.rappeurs') }}">
                <li><i class="fa-solid fa-microphone"></i> Rappeurs</li>
            </a>
            <a href="">
                <li><i class="fa-solid fa-graduation-cap"></i> P'tit Bac</li>
            </a>
            <a href="">
                <li><i class="fa-solid fa-newspaper"></i> Médias</li>
            </a>
            <a href="">
                <li><i class="fa-solid fa-book"></i> Infos</li>
            </a>
        </ul>
    </nav>
    
    @yield('content')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://kit.fontawesome.com/e68d38466e.js" crossorigin="anonymous"></script>
</body>
</html>