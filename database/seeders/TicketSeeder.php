<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::insert([
            [
                'user_id' => 1,
                'title' => 'عدم دریافت ایمیل تایید',
                'status' => 'draft',
                'importance' => 'onImportant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'مشکل در ورود به سیستم',
                'status' => 'process',
                'importance' => 'normalImportant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'title' => 'درخواست تغییر شماره تماس',
                'status' => 'closed',
                'importance' => 'veryImportant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'title' => 'تاخیر در پاسخگویی به پیام‌ها',
                'status' => 'pending',
                'importance' => 'veryImportant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'title' => 'مشکل در بارگذاری فایل‌ها',
                'status' => 'reply',
                'importance' => 'onImportant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
