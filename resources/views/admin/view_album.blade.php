@extends('layouts.admin')

@section('content')

    <section class="container">
        <h1 id="album_title"></h1>

        <div id="dz-root"></div>

        <div class="infos_album">
            <div id="image_album"></div>

            <div class="infos_content">
                <div class="infos_rappeur"></div>

                <div class="album_content"></div>
            </div>
        </div>

        <div class="tracks">
            <ul class="list_tracks"></ul>
        </div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://e-cdn-files.dzcdn.net/js/min/dz.js"></script> 
    <script>
        function secondsToHm(d) {
            d = Number(d);
            var h = Math.floor(d / 3600);
            var m = Math.floor(d % 3600 / 60);

            var hDisplay = h > 0 ? h + " h " : "";
            var mDisplay = m > 0 ? m + " min" : "";
            return hDisplay + mDisplay; 
        }

        function secondsToMs(d) {
            d = Number(d);
            var m = Math.floor(d % 3600 / 60);
            var s = Math.floor(d % 3600 % 60);

            var mDisplay = m > 0 ? (m < 10 ? "0" + m : m )+ ":" : "00";
            var sDisplay = s > 0 ? (s < 10 ? "0" + s : s) : "00";
            return mDisplay + sDisplay; 
        }

        DZ.api('/album/{{ $album->token }}', function(response){
            console.log(response);
            $('#image_album').append(`<img src="${response.cover_big}" alt="${response.tilte}">`);
            $('#album_title').append(response.title);

            $('.infos_rappeur').append(`
                <a href="/admin/rappeurs/${response.artist.id}" class="rappeur">
                    <img src="${response.artist.picture}" alt="${response.artist.name}">
                    <h2>${response.artist.name}</h2>
                </a>
            `);

            $('.album_content').append(`
                <p>${response.nb_tracks} titres - ${secondsToHm(response.duration)}</p>
                <p>${response.release_date}</p>
            `);

            for (let i = 0; i < response.tracks.data.length; i++){
                // console.log(response.tracks.data[i]);
                DZ.api('/track/'+response.tracks.data[i].id, function(response){
                    // console.log(response);
                    if (response.contributors.length === 2){
                        $('.list_tracks').append(`<li class="track">
                                                    <div>
                                                        <span class="order">${i + 1}</span>
                                                        <span class="title">${response.title}</span>
                                                        <a href="/admin/rappeurs/${response.contributors[1].id}" class="feat">${response.contributors[1].name}</a>
                                                    </div>
                                                    <span class="time">${secondsToMs(response.duration)}</span>
                                                </li>`);
                    } else {
                        $('.list_tracks').append(`<li class="track">
                                                    <div>
                                                        <span class="order">${i + 1}</span>
                                                        <span class="title">${response.title}</span>
                                                    </div>
                                                    <span class="time">${secondsToMs(response.duration)}</span>
                                                </li>`);
                    }
                });
            }
        });
    </script>

@endsection