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
                'des_rep' => 'DJ',
                'desc_rep' => "Dejeuner",
            ],
            [
                'des_rep' => 'D',
                'desc_rep' => "Dinner",
            ],
            [
                'des_rep' => 'Pack Complet',
                'desc_rep' => "Dejeuner + Petit Dejeuner + Dinner",
            ]
        ];
        DB::table('repas')->insert($repas);
    }

}
