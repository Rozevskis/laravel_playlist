<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('songs')->insert([
            ['name' => 'Blinding Lights', 'artist' => 'The Weeknd', 'genre' => 'Pop'],
            ['name' => 'Watermelon Sugar', 'artist' => 'Harry Styles', 'genre' => 'Pop'],
            ['name' => 'Shape of You', 'artist' => 'Ed Sheeran', 'genre' => 'Pop'],
            ['name' => 'Circles', 'artist' => 'Post Malone', 'genre' => 'Rock'],
            ['name' => 'Bad Guy', 'artist' => 'Billie Eilish', 'genre' => 'Alternative'],
            ['name' => 'Dance Monkey', 'artist' => 'Tones and I', 'genre' => 'Dance'],
            ['name' => 'Savage Love', 'artist' => 'Jawsh 685, Jason Derulo', 'genre' => 'Pop'],
            ['name' => 'Levitating', 'artist' => 'Dua Lipa', 'genre' => 'Pop'],
            ['name' => 'Rockstar', 'artist' => 'DaBaby ft. Roddy Ricch', 'genre' => 'Hip-Hop'],
            ['name' => 'Someone You Loved', 'artist' => 'Lewis Capaldi', 'genre' => 'Pop'],
        ]);
    }
}
