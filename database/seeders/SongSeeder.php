<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('songs')->insert([
            ['title' => 'Blinding Lights', 'artist' => 'The Weeknd', 'genre' => 'Pop'],
            ['title' => 'Watermelon Sugar', 'artist' => 'Harry Styles', 'genre' => 'Pop'],
            ['title' => 'Shape of You', 'artist' => 'Ed Sheeran', 'genre' => 'Pop'],
            ['title' => 'Circles', 'artist' => 'Post Malone', 'genre' => 'Rock'],
            ['title' => 'Bad Guy', 'artist' => 'Billie Eilish', 'genre' => 'Alternative'],
            ['title' => 'Dance Monkey', 'artist' => 'Tones and I', 'genre' => 'Dance'],
            ['title' => 'Savage Love', 'artist' => 'Jawsh 685, Jason Derulo', 'genre' => 'Pop'],
            ['title' => 'Levitating', 'artist' => 'Dua Lipa', 'genre' => 'Pop'],
            ['title' => 'Rockstar', 'artist' => 'DaBaby ft. Roddy Ricch', 'genre' => 'Hip-Hop'],
            ['title' => 'Someone You Loved', 'artist' => 'Lewis Capaldi', 'genre' => 'Pop'],
        ]);
    }
}