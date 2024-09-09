<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Song;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::with('songs')->get(); // Eager load the songs for each playlist

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
            'name' => 'required',
            'tag' => 'required'
        ]);

        Playlist::create([
            'name' => $request->input('name'),
            'tag' => $request->input('tag')
        ]);

        return redirect('/playlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        // Eager load songs
        $playlist->load('songs');

        // Get all songs
        $allSongs = Song::all();

        // Filter out the songs already in the playlist
        $availableSongs = $allSongs->filter(function ($song) use ($playlist) {
            return !$playlist->songs->contains($song);
        });

        return view('playlist.show', [
            'playlist' => $playlist,
            'songs' => $availableSongs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Retrieve the playlist by its ID
        $playlist = Playlist::findOrFail($id);

        // Pass the playlist to the view
        return view('playlist.edit', ['playlist' => $playlist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'tag' => 'required'
        ]);

        // Find the playlist and update its attributes
        $playlist = Playlist::findOrFail($id);
        $playlist->update([
            'name' => $request->input('name'),
            'tag' => $request->input('tag'),
        ]);

        // Redirect back to the playlists index page
        return redirect()->route('playlist.index')->with('success', 'Playlist updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Retrieve the playlist by its ID, including its related songs
        $playlist = Playlist::with('songs')->findOrFail($id);

        // Detach songs from the playlist
        $playlist->songs()->detach();

        // Delete the playlist
        $playlist->delete();

        // Redirect to the playlist index page
        return redirect()->route('playlist.index')->with('success', 'Playlist deleted successfully.');
    }

    //Returns to the playlist show page
    // public function removeSong(Playlist $playlist, Song $song)
    // {
    // // Detach the song from the playlist
    // $playlist->songs()->detach($song->id);

    // // Redirect back to the playlist show page with a success message
    // return redirect()->route('playlist.show', $playlist->id)->with('success', 'Song removed from playlist.');
    // }

    public function removeSong(Playlist $playlist, Song $song)
    {
        // Detach the song from the playlist
        $playlist->songs()->detach($song->id);

        // Redirect back to the playlist show page with a success message
        return redirect()->route('playlist.index')->with('success', 'Song removed from playlist.');
    }
    public function addSong(Request $request, Playlist $playlist)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        $songId = $request->input('song_id');

        // Attach the song to the playlist
        $playlist->songs()->attach($songId);

        return redirect()->route('playlist.show', $playlist->id)->with('success', 'Song added to playlist.');
    }
}
