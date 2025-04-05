<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Limit_a2;
use App\Models\Limit;
use App\Models\Limit_b1;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // O'zingiz xohlagan ma'lumotlarni qo'shish
        Limit::create([
            'end_date' => '2025-12-12', // Siz xohlagan tugash sanasi
            'max_submissions' => 10 // Siz xohlagan maksimal murojaatlar soni
        ]);
        Limit_a2::create([
            'end_date' => '2025-12-12', // Siz xohlagan tugash sanasi
            'max_submissions' => 10 // Siz xohlagan maksimal murojaatlar soni
        ]);

        Limit_b1::create([
            'end_date' => '2025-12-12', // Siz xohlagan tugash sanasi
            'max_submissions' => 10 // Siz xohlagan maksimal murojaatlar soni
        ]);
    }
}
