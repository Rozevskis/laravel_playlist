<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('playlist_song')->insert([
            // Playlist 1
            ['playlist_id' => 1, 'song_id' => 1],
            ['playlist_id' => 1, 'song_id' => 2],
            ['playlist_id' => 1, 'song_id' => 3],
            ['playlist_id' => 1, 'song_id' => 4],
            ['playlist_id' => 1, 'song_id' => 5],

            // Playlist 2
            ['playlist_id' => 2, 'song_id' => 2],
            ['playlist_id' => 2, 'song_id' => 3],
            ['playlist_id' => 2, 'song_id' => 4],
            ['playlist_id' => 2, 'song_id' => 5],
            ['playlist_id' => 2, 'song_id' => 6],

            // Playlist 3
            ['playlist_id' => 3, 'song_id' => 1],
            ['playlist_id' => 3, 'song_id' => 4],
            ['playlist_id' => 3, 'song_id' => 5],
            ['playlist_id' => 3, 'song_id' => 7],
            ['playlist_id' => 3, 'song_id' => 8],

            // Adding more entries to ensure all songs are covered
            ['playlist_id' => 1, 'song_id' => 6],
            ['playlist_id' => 2, 'song_id' => 7],
            ['playlist_id' => 3, 'song_id' => 9],
            ['playlist_id' => 1, 'song_id' => 10],
            ['playlist_id' => 2, 'song_id' => 10],
        ]);
    }
}
