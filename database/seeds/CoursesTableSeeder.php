<?php

use IDEALE\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Course::class, 12)->create(['user_id' => 1, 'category_id' => 1 ]);
        factory(Course::class, 12)->create(['user_id' => 2, 'category_id' => 2 ]);
        factory(Course::class, 12)->create(['user_id' => 3, 'category_id' => 3 ]);


    }
}
