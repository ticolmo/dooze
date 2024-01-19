<?php

namespace Database\Seeders;


use App\Models\Commentaire;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commentaire::factory()
                    ->count(10)
                    ->create();
                }
}
