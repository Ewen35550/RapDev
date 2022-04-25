@extends('layouts.track')

@section('content')

    <div id="dz-root"></div>

    <section id="track">
        <header>
            <i class='bx bx-chevron-down'></i>

            <div class="middle">
                <p class="muted">Album</p>
                <h4 id="name_album"></h4>
            </div>

            <i class='bx bx-chevron-down hidden'></i>
        </header>

        <div class="cover">
            <img src="" alt="" id="cover_track">
        </div>

        <div class="controlls">
            <div>
                <i class='bx bxs-share'></i>
                <div id="play_button">
                    <i class='bx bx-dots-horizontal-rounded'></i>
                </div>
                <i class='bx bx-heart' ></i>
            </div>

            <div class="progress_bar">
                <audio controls src="" id="track_audio">Your browser does not support the <code>audio</code> element.</audio>
            </div>

            <div class="title">
                <h2 id="track_title"></h2>
                <div class="muted" id="contributors"></div>
            </div>

            <div class="lecture">
                <i class='bx bx-repeat' ></i>

                <div>
                    <i class='bx bx-skip-previous' ></i>
                    <i class='bx bx-play' id="play_button"></i>
                    <i class='bx bx-skip-next' ></i>
                </div>

                <i class='bx bx-shuffle'></i>
            </div>
        </div>
    </section>

    <script src="https://e-cdn-files.dzcdn.net/js/min/dz.js"></script> 
    <script>
        // 128716605
        // 1052600272
        DZ.api('/track/{{ $track }}', function(response){
            console.log(response);

            $('#name_album').text(response.album.title);
            $('#cover_track').attr('src', response.album.cover_big);
            $('#track_audio').attr('src', response.preview);
            $('#track_title').text(response.title);

            let artists = "";

            for (let i = 0; i < response.contributors.length; i++){
                if (response.contributors[i + 1]){
                    artists += response.contributors[i].name + ', ';
                } else {
                    artists += response.contributors[i].name;
                }
            }

            $('#contributors').text(artists + " · " + response.album.title);
        });
    </script>
@endsection