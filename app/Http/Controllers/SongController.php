<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    
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
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required'
        ]);

        Song::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'genre' => $request->input('genre')
        ]);

        return redirect('/playlist'); //--------------Šo vajadzēs samainīt!!!!!!
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       return view('playlist.show');
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
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required'
        ]);

        
        if ($request->user()->id == auth()->user()->id) {
            Song::where('id', $id)
                ->update([
                    'title' => $request->input('title'),
                    'artist' => $request->input('artist'),
                    'genre' => $request->input('genre')
        ]);
    }

    return redirect('/playlist'); //--------------Šo vajadzēs samainīt!!!!!!
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $song = Song::where('id', $id);

        $song->delete();

        return redirect('/playlist'); //--------------Šo vajadzēs samainīt!!!!!!
    }
}
