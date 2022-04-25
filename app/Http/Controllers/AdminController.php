<?php

namespace App\Http\Controllers;

use App\Models\Rappeur;
use App\Models\Reseau;
use App\Models\Album;
use App\Models\Titre;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('/admin/index');
    }

    /* ==============================
     *                              *
     *          Rappeurs            *
     *                              *
    ============================== */

    public function index_rap() 
    {
        $rappeurs = Rappeur::all();

        return view('admin/rappeurs', compact('rappeurs'));
    }

    public function show_rap($id)
    {
        $rappeur = Rappeur::join('reseaux', 'rappeurs.id', '=', 'reseaux.id_rappeur')
                            ->where('rappeurs.token', $id)->firstOrFail();
        
        $albums = Album::where('id_rappeur', $rappeur->id)
                        ->orderBy('id')
                        ->get();

        return view('admin/view_rappeur', compact('rappeur', 'albums'));
    }

    public function create_rap()
    {
        return view('admin/create_rappeur');
    }

    public function update_rap(Request $request)
    {
        $request->validate([
            'photo' => ['nullable', 'mimes:jpg,png,jpeg,gif', 'max:5048'],
            'name' => ['required', 'string', 'unique:users', 'max:255'],
            'groupe' => ['nullable', 'string', 'max:255'],
            'youtube' => ['nullable', 'string', 'max:255'],
            'spotify' => ['nullable', 'string', 'max:255'],
            'deezer' => ['nullable', 'string', 'max:255'],
            'soundcloud' => ['nullable', 'string', 'max:255'],
        ]);

        $rappeur = Rappeur::where('id', $request->id_rappeur)->firstOrFail();
        $reseaux = Reseau::where('id_rappeur', $request->id_rappeur)->firstOrFail();

        if ($request->photo !== null){
            $request->rap_image->move(public_path('img'), $request->name.$request->photo->extension());
            $rappeur->photo = $request->name.$request->photo->extension();
        }

        $rappeur->nom = $request->name;
        $rappeur->groupe = $request->groupe;
        $rappeur->save();

        $reseaux->youtube = $request->youtube;
        $reseaux->spotify = $request->spotify;
        $reseaux->deezer = $request->deezer;
        $reseaux->soundcloud = $request->soundcloud;
        $reseaux->save();

        return redirect('/admin/rappeurs/'.$request->id_rappeur);
    }

    public function add_rap(Request $request)
    {
        $request->validate([
            'token' => ['required', 'string', 'max:255'],
            'youtube' => ['nullable', 'string', 'max:255'],
            'spotify' => ['nullable', 'string', 'max:255'],
            'deezer' => ['nullable', 'string', 'max:255'],
            'soundcloud' => ['nullable', 'string', 'max:255'],
        ]);

        $token = $request->token;

        if (str_contains($request->token, 'https://www.deezer.com/fr/artist/')){
            $token = str_replace('https://www.deezer.com/fr/artist/', '', $request->token);
        }

        $rappeur = Rappeur::create([
            'token' => $token,
        ]);

        Reseau::create([
            'id_rappeur' => $rappeur->id,
            'youtube' => $request->youtube,
            'spotify' => $request->spotify,
            'deezer' => $request->deezer,
            'soundcloud' => $request->soundcloud,
        ]);

        return redirect()->route('admin.rappeurs');
    }

    /* ==============================
     *                              *
     *           Albums             *
     *                              *
    ============================== */

    public function index_albums() 
    {
        $albums = Album::all();

        return view('admin/albums', compact('albums'));
    }

    public function create_album()
    {
        $rappeurs = Rappeur::all();

        return view('admin/create_album', compact("rappeurs"));
    }

    public function add_album(Request $request)
    {
        $request->validate([
            'id_album' => ['required', 'string', 'max:255'],
        ]);

        $token = $request->id_album;

        if (str_contains($request->id_album, 'https://www.deezer.com/fr/album/')){
            $token = str_replace('https://www.deezer.com/fr/album/', '', $request->id_album);
        }

        $id_rappeur = Rappeur::select('id')->where('token', $request->id_rappeur)->firstOrFail();

        $album = Album::create([
            'id_rappeur' => $id_rappeur->id,
            'token' => $token,
        ]);

        return redirect('/admin/rappeurs/'.$id_rappeur->id);
    }

    public function show_album($id)
    {
        $album = Album::where('token', $id)->firstOrFail();

        return view('admin/view_album', compact('album'));
    }
}
