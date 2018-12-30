<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \IDEALE\Models\User::all();
        factory(\IDEALE\Models\Category::class,15)
            ->make()
            ->each(function($category) use($users){
                \Tenant::setTenant($users->random());
                $category->save();
            });
        \Tenant::setTenant(null);
    }
}
