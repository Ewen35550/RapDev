@extends('layouts.admin')

@section('content')

    <section class="container">
        <h1>Ajouter un album</h1>

        <div id="dz-root"></div>

        @if ($errors->any())
            <ul class="">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <br>
        @endif

        <form action="/admin/add/album" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id_rappeur" id="id_rappeur">

            <div class="form_group">
                <label for="name">Lien ou ID de l'album</label>
                <input type="text" name="id_album" id="id_album" placeholder="Link or ID">
            </div>

            <div class="preview"></div>

            <div class="form_button">
                <button type="submit">Créer</button>
            </div>
        </form>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src = "https://e-cdn-files.dzcdn.net/js/min/dz.js"></script>
    <script>
        let album = $('#id_album');

        album.on('input', function() {
            let id_album = album.val();

            if (album.val().includes("https://www.deezer.com/fr/album/")){
                id_album = album.val().replace('https://www.deezer.com/fr/album/', '');
            }

            function secondsToHms(d) {
                d = Number(d);
                var h = Math.floor(d / 3600);
                var m = Math.floor(d % 3600 / 60);

                var hDisplay = h > 0 ? h + " h " : "";
                var mDisplay = m > 0 ? m + " min" : "";
                return hDisplay + mDisplay; 
            }


            DZ.api('/album/' + id_album, function(response){
                let html = "";

                if (response.type === "album"){
                    console.log(response);

                    html += `
                    <img src="${response.cover}" alt="Cover ${response.title}">
                    <div class="form_group">
                        <label for="rappeur">Rappeur</label>
                        <input type="text" name="rappeur" id="rappeur" value="${response.artist.name}">
                    </div>
                    <div class="form_group">
                        <label for="titre">Ttre</label>
                        <input type="text" name="titre" id="titre" value="${response.title}">
                    </div>
                    <div class="form_group">
                        <label for="date_sortie">Date</label>
                        <input type="text" name="date_sortie" id="date_sortie" value="${response.release_date}">
                    </div>
                    <div class="form_group">
                        <label for="duree">Durée</label>
                        <input type="text" name="duree" id="duree" value="${secondsToHms(response.duration)}">
                    </div>
                    `;
                }

                $('.preview').text("");
                $('.preview').append(html);

                $('#id_rappeur').val(response.artist.id);
            });
        });
    </script>

@endsection