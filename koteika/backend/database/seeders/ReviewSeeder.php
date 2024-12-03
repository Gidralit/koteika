<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'email' => 'testemail1@yandex.com',
            'title' => 'test title 1 qwe',
            'content' => 'test veru big content 1 12315',
            'rating' => 5
        ]);
        Review::create([
            'email' => 'testemail2@google.com',
            'title' => 'test title 2 qwe',
            'content' => 'test veru big content 2 121231323315',
            'rating' => 5
        ]);
        Review::create([
            'email' => 'testemail3@sibmail.com',
            'title' => 'test title 3 qasdsdfwe',
            'content' => 'test veru big conteaskldgdflbgsdlkhgnsjfdgnt 3 12315',
            'rating' => 1
        ]);
        Review::create([
            'email' => 'verytestemail4@yahoo.com',
            'title' => 'test title 4 qwe',
            'content' => ' ksdflkgns ;dflgdsflkgm lsdfkgdsfngjd test veru big content 5 12315',
            'rating' => 2
        ]);
        Review::create([
            'email' => 'testemail5@yandex.com',
            'title' => 'test title 5  ds;gjkndlf;gnsdjkf kjdsfbgsdfkbgsdfgsdf sdfgsdfgsdfgsdfgqwe',
            'content' => 'test veru big content 5 12315',
            'rating' => 3
        ]);
        Review::create([
            'email' => 'testemail6@mail.com',
            'title' => 'test title 6 qwe',
            'content' => 'test veru asdjfaskdgas jlsfdsdfbig content6 12315',
            'rating' => 4
        ]);
    }
}
