<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price')->nullable();
            $table->integer('discount')->nullable();
            $table->decimal('price_discount')->nullable();
            $table->integer('plots')->nullable();
            $table->decimal('price_plots')->nullable();
            $table->string('workload')->nullable();
            $table->boolean('status')->default(0);
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->string('video_presentation')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('courses');
    }
}
