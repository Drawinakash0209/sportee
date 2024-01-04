<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Indoor;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Indoor::create(
         [
        'title' => 'Ciel',
        'tags'=> 'futsal, Cricket',
        'location'=> 'kochikade',
        'email' => 'ciel@gmail.com',
        'website'=> 'www.ciel.com',
        'description' => 'lorem'
         ]);

       Indoor::create(
        [
          'title' => 'Cr7',
          'tags'=> 'futsal, Cricket',
          'location'=> 'Town Hall',
          'email' => 'Cr7@gmail.com',
          'website'=> 'www.Cr7.com',
          'description' => 'Upon entering, youll be greeted by the vibrant energy
           that fills our spacious facility. The layout is thoughtfully organized to accommodate various indoor sports, ensuring theres something for everyone. The polished wooden floors are ideal for sports like basketball, volleyball, and indoor soccer, while the high ceilings give athletes the freedom to reach new heights',
        ]);

        Tournament::create(
          [
            'title' => 'RCL FUTSAL TOURNAMENT',
            'noOFplayers'=> '5 A SIDE',
            'location'=> 'Town Hall',
            'tournamentDate'=> '2024-02-01',
            'description' => 'This is a sample tournament description.',
          ]); 
       
    }
}

