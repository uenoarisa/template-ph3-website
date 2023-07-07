<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \app\Models\Choices::create([
            'text' => '約10万人',
            'is_correct' => false,
            'question_id' => 1,
        ]);
    }
}
