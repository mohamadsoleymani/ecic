<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::insert([
            [
                'user_id' => 1,
                'title' => 'خرید محصول',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title'   => 'پیشنهاد همکاری',
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title'   => 'تغییر شماره موبایل',
                'status' => 'read (admin)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'title'   => 'مشکل در پرداخت',
                'status' => 'read (client.php)',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
