<?php

use IDEALE\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 19416981 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 76979871 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 33091687 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 39780846 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 87143177 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 43005056 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 38040196 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 30698649 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 107234493 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 62396477 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 25934005 ]);
        factory(Lesson::class, 1)->create(['user_id' => 1, 'course_id' => 1, 'video_id' => 113288095 ]);




    }
}
