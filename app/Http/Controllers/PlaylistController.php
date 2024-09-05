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
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
        ]);

        $playlist = Playlist::create($validatedData);

        return redirect()->route('playlists.index')->with('success', 'Playlist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $playlist = Playlist::findOrFail($id);
        return view('playlists.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $playlist = Playlist::findOrFail($id);
        return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
        ]);

        $playlist = Playlist::findOrFail($id);
        $playlist->update($validatedData);

        return redirect()->route('playlists.index')->with('success', 'Playlist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist deleted successfully.');
    }
}