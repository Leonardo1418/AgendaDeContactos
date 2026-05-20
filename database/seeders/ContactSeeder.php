<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts =[
            ['name' => 'Leonardo Rodriguez', 'email' => 'leonardo@ejemplo.com', 'phone' => '6677467387', 'category' => 'other', 'favorite' => true],
            ['name' => 'Maria Garcia', 'email' => 'maria@ejemplo.com', 'phone' => '6671234567', 'category' => 'family'],
            ['name' => 'Carlos Sanchez', 'phone' => '6679876543', 'category' => 'work'],
            ['name' => 'Tadeo Guerra', 'category' => 'personal', 'notes' => 'Amigo de la universidad'],
            ['name' => 'Luis Martinez', 'email' => 'luismar@ejemplo.com', 'category' => 'work'],
            ['name' => 'Ana Lopez'],
            ['name' => 'Sofia Ramirez'],
            ['name' => 'Roberto Rodriguez', 'email' => 'Robertorrr@ejemplo.com', 'phone' => '6675554321', 'category' => 'family', 'notes' => 'Hermano'],
            ['name' => 'Valentina Torres', 'phone' => '6674443210'],
            ['name' => 'Diego Fernandez', 'email' => 'diego@ejemplo.com', 'category' => 'work'],
            ['name' => 'Niko', 'phone' => '6673332109', 'category' => 'other', 'notes' => 'Sushi domicilio'],
            ['name' => 'Sofia Gomez'],
            ['name' => 'Mateo Diaz', 'email' => 'Mateo@ejemplo.com', 'phone' => '6672221098'],
            ['name' => 'Isabella Perez', 'phone' => '6671110987', 'category' => 'family'],
            ['name' => 'Emilia Sanchez']
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
