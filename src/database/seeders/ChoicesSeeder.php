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

        $choices = [[
            'text' => '約79万人',
            'is_correct' => true,
            'question_id' => 1,
        ],[
            'text' => '約28万人',
            'is_correct' => false,
            'question_id' => 1,
        ],[
            'text' => '約183万人',
            'is_correct' => false,
            'question_id' => 1,
        ],[
            'text' => 'INTECH',
            'is_correct' => false,
            'question_id' => 2,
        ],[
            'text' => 'BIZZTECH',
            'is_correct' => false,
            'question_id' => 2,
        ],[
            'text' => 'X-TECH',
            'is_correct' => true,
            'question_id' => 2,
        ],[
            'text' => 'Internet of Things',
            'is_correct' => true,
            'question_id' => 3,
        ],[
            'text' => 'Information on Tool',
            'is_correct' => false,
            'question_id' => 3,
        ],[
            'text' => 'Integrate into Technology',
            'is_correct' => false,
            'question_id' => 3,
        ]];

        foreach ($choices as $choice) {
            \App\Models\Choices::create($choice);
        };
    }
}
