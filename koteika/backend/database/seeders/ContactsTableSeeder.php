<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'address' => 'ул. Пушкина д. Колотушкина',
            'works with' => '8:00',
            'works until' => '20:00',
            'telephone' => '+7 (999) 999 99-99',
            'email' => 'oteldlyazhivotnix@email.com',
            'link_to_vk' => 'https://vk.com/otelfrompets',
            'link_to_instagram' => 'https://instagram.com/otelfrompets',
            'link_to_telegram' => 'https://web.telegram.com/otelfrompets',
        ]);
    }
}
