<?php

namespace Database\Seeders;

use App\Models\QuestionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralQuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionCategory::create([
            'name' => 'Pharmacy General Question',
            'publish' => 'Publish',
            'is_hide' => 1,
        ]);

        QuestionCategory::create([
            'name' => 'Prescription General Question',
            'publish' => 'Publish',
            'is_hide' => 1,
        ]);
    }
}
