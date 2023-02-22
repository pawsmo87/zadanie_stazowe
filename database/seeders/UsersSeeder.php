<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;

class KlientSeeder extends Seeder
{
    public function run()
    {
        Klient::create([
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'email' => 'jan.kowalski@example.com',
            'phone' => '123456789',
        ]);

        Klient::create([
            'name' => 'Maria',
            'surname' => 'Nowak',
            'email' => 'maria.nowak@example.com',
            'phone' => '987654321',
        ]);
    }
}