<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [[
            'text' => '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
            'quiz_id' => 1,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています。'
        ],[
            'text' => '既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
            'quiz_id' => 1,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ],[
            'text' => 'IoTとは何の略でしょう？',
            'quiz_id' => 1,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ],[
            'text' => '出身地はどこでしょう？',
            'quiz_id' => 2,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ],
        [
            'text' => '在籍中の大学はどこでしょう？',
            'quiz_id' => 2,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ],
        [
            'text' => '動物に例えるとなんと言われることが多いでしょう?',
            'quiz_id' => 2,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ],
        [
            'text' => 'POSSEとは別に何のサークルにどくしているのでしょう',
            'quiz_id' => 3,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ],
        [
            'text' => '在籍中の大学はどこでしょう？',
            'quiz_id' => 3,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ],
        [
            'text' => '何学部でしょうか？',
            'quiz_id' => 3,
            'image' => 'default.jpeg',
            'supplement' => '日本のIT人材が2030年には最大で約79万人不足すると言われています'
        ]];

        foreach ($questions as $question) {
            \App\Models\Questions::create($question);
        };
    
    }
}
