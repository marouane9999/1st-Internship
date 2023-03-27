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
                'des_rep' => 'Petit Dejeuner',
                'desc_rep' => "Petit Dejeuner",
            ],
            [
                'des_rep' => 'Dejeuner',
                'desc_rep' => "Dejeuner",
            ],
            [
                'des_rep' => 'Dinner',
                'desc_rep' => "Dinner",
            ]
        ];
        DB::table('repas')->insert($repas);
    }

}
