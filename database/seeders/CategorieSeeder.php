<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'des_cat' => 'Volontaire',
            'desc_cat' => "Responsable sur l'organisation des activites Sporitfs",
        ],
        [
            'des_cat' => 'Delegation Sportif',
            'desc_cat' => "Controlleur des activites sportifs",
        ]
        );
    }
}
