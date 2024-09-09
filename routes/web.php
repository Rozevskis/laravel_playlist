<?php
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('playlist', PlaylistController::class);

//REmove song from playlist
route::delete('/playlists/{playlist}/songs/{song}', [PlaylistController::class, 'removeSong'])->name('playlist.removeSong');
// Add this route for adding songs to playlists
Route::post('/playlist/{playlist}/add-song', [PlaylistController::class, 'addSong'])->name('playlist.addSong');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
