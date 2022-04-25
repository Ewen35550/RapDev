<nav>
    <div class="btn_nav">
        <i class="fa-solid fa-bars" id="btnNav"></i>
        <!-- <i class='bx bx-menu'></i> -->
    </div>

    <h1>RapDev</h1>
    
    <div class="link_profil">
        @auth
        <span class="btn_profil"><img src="{{ asset('img/default_user.png') }}" alt="Image User" id="image_user"></span>
        <div class="menu_profil">
            <ul>
                <a href="">
                    <li><i class="fa-solid fa-user"></i> Profil</li>
                </a>
                <a href="">
                    <li><i class="fa-solid fa-heart"></i> Favoris</li>
                </a>
                <a href="">
                    <li><i class="fa-solid fa-compass"></i> Découvrir</li>
                </a>
                <hr>
                <a href="">
                    <li><i class="fa-solid fa-arrow-right-from-bracket"></i> Deconnexion</li>
                </a>
            </ul>
        </div>
        @else
            <a href="{{ route("login") }}">Se connecter</a>
        @endauth
    </div>
</nav>

<div class="menu_slide">
    <ul>
        <a href="{{ Route('home') }}">
            <li><i class="fa-solid fa-house"></i> Home</li>
        </a>
        <a href="{{ Route('rappeurs') }}">
            <li><i class="fa-solid fa-microphone"></i> Rappeurs</li>
        </a>
    </ul>
</div>