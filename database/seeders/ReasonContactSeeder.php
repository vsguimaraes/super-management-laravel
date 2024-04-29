<?php

namespace Database\Seeders;

use App\Models\ReasonContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReasonContact::create(['name' => 'Dúvida']);
        ReasonContact::create(['name' => 'Elogio']);
        ReasonContact::create(['name' => 'Reclamação']);
    }
}
