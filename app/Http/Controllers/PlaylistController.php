<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::all();
        return view('playlist.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //-- Create blade failā vajadzēs datus ar šādiem nosaukumiem, laikam?
        $request->validate([
            'name' => 'required',
            'tag' => 'required',
        ]);

        Playlist::create([
            'name' => $request->input('name'),
            'tag' => $request->input('tag'),
            // 'slug' => SlugService::createSlug(Playlist::class, 'slug', $request->title),
            // 'image_path' => $newImageName,
            // 'user_id' => auth()->user()->id <--------- šitos nezin vai vajag
        ]);

        return redirect('/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        return view('playlist.view', ['playlist' => $playlist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
    }
}