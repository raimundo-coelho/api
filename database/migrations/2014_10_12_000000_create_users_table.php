<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('enrolment')->unique();
            $table->nullableMorphs('userable');
            $table->string('cpf')->nullable();
            $table->string('other_document')->nullable();
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('postcode', 12);
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->string('neighborhood');
            $table->string('uf', 2);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
