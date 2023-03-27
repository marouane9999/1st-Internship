<?php

namespace Database\Seeders;

use App\Models\Repas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repas=[
            [
                'des_rep' => 'PDJ',
                'desc_rep' => "Petit Dejeuner",
            ],
            [
                'des_cat' => 'DJ',
                'desc_cat' => "Dejeuner",
            ],
            [
                'des_cat' => 'D',
                'desc_cat' => "Dinner",
            ],
            [
                'des_cat' => 'Pack Complet',
                'desc_cat' => "Dejeuner + Petit Dejeuner + Dinner",
            ]
        ];
        DB::table('repas')->insert($repas);
    }

}
