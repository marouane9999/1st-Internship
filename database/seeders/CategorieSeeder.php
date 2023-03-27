<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie=[
            [
                'des_cat' => 'Volontaire',
                'desc_cat' => "Responsable sur l'organisation des activites Sporitfs",
            ],
            [
                'des_cat' => 'delegation Sportif',
                'desc_cat' => "Controlleur des activites sportifs",
            ],
            [
                'des_cat' => 'officiel technique',
                'desc_cat' => "Responsable sur les problemes technique",
            ]
        ];
        DB::table('categories')->insert($categorie);
    }
}
