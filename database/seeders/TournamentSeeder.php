<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tournament::create([
            'name' => 'Geg 2023 Nepal Qualifier',
            'start_date' => '2023-12-01',
            'end_date' => '2023-12-30',
            'color' => '#3F51B5'
        ]);

        Tournament::create([
            'name' => 'Nepal Esports Championship 2023',
            'start_date' => '2023-12-01',
            'end_date' => '2023-12-30',
            'color' => '#FFC107'
        ]);
    }
}
