<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'name' => 'Телефон',
                'key' => 'phone',
                'type' => 'tel.',
            ],
            [
                'name' => 'Email',
                'key' => 'email',
                'type' => 'mailto:',
            ],
            [
                'name' => 'Telegram',
                'key' => 'telegram',
                'type' => 'https://t.me/',
            ],
            [
                'name' => 'Viber',
                'key' => 'viber',
                'type' => 'viber://chat?number=',
            ],
            [
                'name' => 'WhatsApp',
                'key' => 'whatsapp',
                'type' => 'whatsapp://send?phone=',
            ],
        ];

        foreach ($arr as $items) {
            Contact::create([
                'name' => $items['name'],
                'key' => $items['key'],
                'type' => $items['type'],
            ]);
        }
    }
}
