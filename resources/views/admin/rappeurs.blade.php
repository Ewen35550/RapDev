@extends('layouts.admin')

@section('content')

    <section class="container">
        <h1>Rappeurs</h1>

        <div id="dz-root"></div>

        <a href="/admin/create/rappeur" class="btn">Ajouter un rappeur</a>

        <form action="" id="form_liste">
            <input type="radio" name="liste" id="All" checked>
            <label for="All">All</label>
            /
            <input type="radio" name="liste" id="A">
            <label for="A">A</label>
            /
            <input type="radio" name="liste" id="B">
            <label for="B">B</label>
            /
            <input type="radio" name="liste" id="C">
            <label for="C">C</label>
            /
            <input type="radio" name="liste" id="D">
            <label for="D">D</label>
            /
            <input type="radio" name="liste" id="E">
            <label for="E">E</label>
            /
            <input type="radio" name="liste" id="F">
            <label for="F">F</label>
            /
            <input type="radio" name="liste" id="G">
            <label for="G">G</label>
            /
            <input type="radio" name="liste" id="H">
            <label for="H">H</label>
            /
            <input type="radio" name="liste" id="I">
            <label for="I">I</label>
            /
            <input type="radio" name="liste" id="J">
            <label for="J">J</label>
            /
            <input type="radio" name="liste" id="K">
            <label for="K">K</label>
            /
            <input type="radio" name="liste" id="L">
            <label for="L">L</label>
            /
            <input type="radio" name="liste" id="M">
            <label for="M">M</label>
            /
            <input type="radio" name="liste" id="N">
            <label for="N">N</label>
            /
            <input type="radio" name="liste" id="O">
            <label for="O">O</label>
            /
            <input type="radio" name="liste" id="P">
            <label for="P">P</label>
            /
            <input type="radio" name="liste" id="Q">
            <label for="Q">Q</label>
            /
            <input type="radio" name="liste" id="R">
            <label for="R">R</label>
            /
            <input type="radio" name="liste" id="S">
            <label for="S">S</label>
            /
            <input type="radio" name="liste" id="T">
            <label for="T">T</label>
            /
            <input type="radio" name="liste" id="U">
            <label for="U">U</label>
            /
            <input type="radio" name="liste" id="V">
            <label for="V">V</label>
            /
            <input type="radio" name="liste" id="W">
            <label for="W">W</label>
            /
            <input type="radio" name="liste" id="X">
            <label for="X">X</label>
            /
            <input type="radio" name="liste" id="Y">
            <label for="Y">Y</label>
            /
            <input type="radio" name="liste" id="Z">
            <label for="Z">Z</label>
        </form>

        <ul class="list"></ul>
    </section>

    <script src="https://e-cdn-files.dzcdn.net/js/min/dz.js"></script>
    <script>
        @foreach ($rappeurs as $rap)
            DZ.api('/artist/' + {{ $rap->token }}, function(response){
                let html = "";

                html += `
                    <a href="/admin/rappeurs/{{ $rap->token }}">
                        <li>
                            <div>
                                <img src="${response.picture_small}" alt="${response.name}">
                                <span>${response.name}</span>
                            </div>
                            <span>{{ date('d/m/Y', strtotime($rap->created_at)) }}</span>
                        </li>
                    </a>
                `;

                $('.list').append(html);
            });
        @endforeach
    </script>

@endsection