<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $contact = new Contact();
        $contact->name = 'Fabiano Soares';
        $contact->email = 'fabinho@croco.com';
        $contact->phone = '(11) 99999-9999';
        $contact->type = 1;
        $contact->message = 'Olá! Gostaria de mais informações sobre o super gestão';
        $contact->save();

        Contact::create([
            'name' => 'Maisa',
            'email' => 'maisa@gmail.com',
            'phone' => '3984843894398',
            'type' => 2,
            'message' => 'Estou gostando bastante do Super Gestão'
        ]); // utilizando os fillables

        DB::table('contacts')->insert([
            'name' => 'Marcelo',
            'email' => 'marcelo@gmail.com',
            'phone' => '2295500304',
            'type' => 3,
            'message' => 'O Super Gestão é muito bom'
        ]);
        */
        Contact::factory()->count(100)->create(); // criei a factory e com base nela foram criados dados falsos
    }
}
