@extends('layouts.admin')

@section('content')

    <section class="container">
        <h1>Ajouter un rappeur</h1>

        @if ($errors->any())
            <ul class="">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <br>
        @endif

        <form action="/admin/add/rappeur" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form_group">
                <label for="token">Lien ou ID</label>
                <input type="text" name="token" id="token" placeholder="Lien ou ID" required>
            </div>

            <div class="form_group">
                <label for="groupe">Youtube</label>
                <input type="text" name="youtube" id="youtube" placeholder="Youtube">
            </div>

            <div class="form_group">
                <label for="groupe">Spotify</label>
                <input type="text" name="spotify" id="spotify" placeholder="Spotify">
            </div>

            <div class="form_group">
                <label for="groupe">Deezer</label>
                <input type="text" name="deezer" id="deezer" placeholder="Deezer">
            </div>

            <div class="form_group">
                <label for="groupe">Soundcloud</label>
                <input type="text" name="soundcloud" id="soundcloud" placeholder="Soundcloud">
            </div>

            <div class="form_button">
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </section>

@endsection