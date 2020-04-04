<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->string('lesson_id', 90)->primary();
            $table->string('title', 90);
            $table->text('bodyContent');
            $table->string('belongs_to_chapter', 40);// chapters like intro, if, vectors etc.
            $table->string('previous_lesson_id', 90);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
