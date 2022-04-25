@extends('layouts.admin')

@section('content')

    <section class="container">
        <h1 id="rappeur_name"></h1>

        <div id="dz-root"></div>

        <div class="infos_rappeur">
            <div id="image_rappeur"></div>

            <div class="infos_content">
                @if ($rappeur->groupe)<h2>{{ $rappeur->groupe }}</h2>@endif

                <ul>
                    @if ($rappeur->youtube)<li>Youtube : {{ $rappeur->youtube }}</li>@endif
                    @if ($rappeur->spotify)<li>Spotify : {{ $rappeur->spotify }}</li>@endif
                    @if ($rappeur->deezer)<li>Deezer : {{ $rappeur->deezer }}</li>@endif
                    @if ($rappeur->soundcloud)<li>Soundcloud : {{ $rappeur->soundcloud }}</li>@endif
                </ul>
            </div>

            {{-- <form action="/admin/rappeurs/update" method="post" enctype="multipart-formdata">
                @csrf

                <input type="hidden" name="id_rappeur" value="{{ $rappeur->id }}">
                
                <div class="form_group">
                    <label class="label_file">
                        <i class="fa-solid fa-image"></i> Choisir une image
                        <input type="file" name="photo" id="photo">
                    </label>
                    <p class="name_image"></p>
                </div>
                
                <div class="form_group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" value="{{ $rappeur->nom }}" placeholder="Nom" required>
                </div>
                
                <div class="form_group">
                    <label for="groupe">Groupe</label>
                    <input type="text" name="groupe" id="groupe" value="{{ $rappeur->groupe }}" placeholder="Groupe">
                </div>

                <div class="form_group">
                    <label for="youtube">Youtube</label>
                    <input type="text" name="youtube" id="youtube" value="{{ $rappeur->youtube }}" placeholder="Youtube">
                </div>

                <div class="form_group">
                    <label for="spotify">Spotify</label>
                    <input type="text" name="spotify" id="spotify" value="{{ $rappeur->spotify }}" placeholder="Spotify">
                </div>

                <div class="form_group">
                    <label for="deezer">Deezer</label>
                    <input type="text" name="deezer" id="deezer" value="{{ $rappeur->deezer }}" placeholder="Deezer">
                </div>

                <div class="form_group">
                    <label for="soundcloud">Soundcloud</label>
                    <input type="text" name="soundcloud" id="soundcloud" value="{{ $rappeur->soundcloud }}" placeholder="Soundcloud">
                </div>

                <div class="form_button">
                    <button type="submit">Modifier</button>
                </div>
            </form> --}}
        </div>

        <div class="container_items">
            <h2>Albums <a href="/admin/create/album"><i class="fa-regular fa-square-plus"></i></a></h2>

            <div class="items" id="album_items"></div>
            {{-- <p class="view_more">Voir plus</p> --}}
        </div>

        <div class="container_items">
            <h2>Titres <a href=""><i class="fa-regular fa-square-plus"></i></a></h2>

            <div class="items">
                <a href="" class="item">
                    <img src="{{ asset('img/Damso.jpg') }}" alt=""><br>
                    <p>Ipséité</p>
                    <div class="infos_item">
                        <span>13 titres</span>
                        <span>12/03/2019</span>
                    </div>
                </a>
            </div>
            <p class="view_more">Voir plus</p>
        </div>

        <div class="container_items">
            <h2>Feats</h2>

            <div class="items">
                <a href="" class="item">
                    <img src="{{ asset('img/Damso.jpg') }}" alt=""><br>
                    <p>Ipséité</p>
                    <div class="infos_item">
                        <span>13 titres</span>
                        <span>12/03/2019</span>
                    </div>
                </a>
            </div>
            <p class="view_more">Voir plus</p>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://e-cdn-files.dzcdn.net/js/min/dz.js"></script> 
    <script>
        DZ.api('/track/128716605', function(response){
            console.log(response);
        });

        DZ.api('/artist/{{ $rappeur->token }}', function(response){
            $('#image_rappeur').append(`<img src="${response.picture_big}" alt="${response.name}">`);
            $('#rappeur_name').append(response.name)
        });

        let albums_list = $('#album_items');
        let albums = [];
        
        @foreach ($albums as $album )
            albums.push({{ $album->token }});
        @endforeach


        let i = albums.length - 1;
        function loop(){
            setTimeout(() => {
                DZ.api('/album/' + albums[i], function(response){
                    let album = `<a href="/admin/albums/${response.id}" class="item item_album">
                                    <img src="${response.cover_big}" alt=""><br>
                                    <p>${response.title}</p>
                                    <div class="infos_item">
                                        <span>${response.nb_tracks} titres</span>
                                        <span>${response.release_date}</span>
                                    </div>
                                </a>`;
                    
                    albums_list.append(album);
                });
                i--;
                if (i >= 0){
                    loop();
                }
            }, 50);
        }

        if (i !== -1) loop();
        else albums_list.append("<p>Aucun album</p>");
    </script>

@endsection