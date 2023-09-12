<?php

namespace Database\Seeders;

use App\Models\Caster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caster::create([
            'name' => 'Caster 1',
            'image' => 'something',
            'link' => 'https://somelink.com'
        ]);
        Caster::create([
            'name' => 'Caster 2',
            'image' => 'something',
            'link' => 'https://somelink.com'
        ]);
        Caster::create([
            'name' => 'Caster 3',
            'image' => 'something',
            'link' => 'https://somelink.com'
        ]); 
    }
}
