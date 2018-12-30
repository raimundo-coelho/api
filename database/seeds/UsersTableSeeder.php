<?php

use IDEALE\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin@user.com',
            'enrolment' => 100000,
            'cpf' => '00000000011',
            'other_document' => 'MG670943-SSP-MG'
        ])->each(function(User $user){
            User::assingRole($user, User::ROLE_ADMIN);
            $user->save();
        });

        factory(User::class)->create([
            'email' => 'teacher@user.com',
            'enrolment' => 400000,
            'cpf' => '00000000022',
            'other_document' => 'MG670953-SSP-MG'
        ])->each(function(User $user){
            if(!$user->userable) {
                User::assingRole($user, User::ROLE_TEACHER);
                $user->save();
            }
        });

        factory(User::class)->create([
            'email' => 'student@user.com',
            'enrolment' => 700000,
            'cpf' => '00000000033',
            'other_document' => 'MG670963-SSP-MG'
        ])->each(function(User $user){
            if(!$user->userable) {
                User::assingRole($user, User::ROLE_STUDENT);
                $user->save();
            }
        });

/*        factory(User::class,100)->create()->each(function(User $user){
            if(!$user->userable) {

                User::assingRole($user, User::ROLE_TEACHER);
                User::assignEnrolment(new User(), User::ROLE_TEACHER);
                $user->save();
            }
        });

        factory(User::class,100)->create()->each(function(User $user){
            if(!$user->userable) {

                User::assingRole($user, User::ROLE_STUDENT);
                User::assignEnrolment(new User(), User::ROLE_STUDENT);
                $user->save();
            }
        });*/
    }

}
