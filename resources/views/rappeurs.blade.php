@extends('layouts.template')

@section('content')

    <section class="container">
        <h1>Rappeurs</h1>

        <form action="" id="form_search">
            <input type="text" name="" id="" placeholder="Search">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <ul class="items">
            @foreach ($rappeurs as $rappeur)
            <a href="">
                <li class="item">
                    <div>
                        <img src="{{ asset('img/'.$rappeur->photo) }}" alt="">
                        <p>{{ $rappeur->nom }}</p>
                    </div>
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
            </a>
            @endforeach
        </ul>
    </section>

@endsection