<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->string('problem_id', 90)->primary();
            $table->string('belongs_to_lesson_or_problem_id', 90);
            $table->string('title', 90);
            $table->text('problem_sentence');
            $table->string('test_input_example', 1024);
            $table->string('test_output_example', 1024);
            $table->string('test1_input', 1024);
            $table->string('test1_expected_output', 1024);
            $table->string('test2_input', 1024);
            $table->string('test2_expected_output', 1024);
            $table->string('test3_input', 1024);
            $table->string('test3_expected_output', 1024);
            $table->string('test4_input', 1024);
            $table->string('test4_expected_output', 1024);
            $table->string('test5_input', 1024);
            $table->string('test5_expected_output', 1024);
            $table->integer('test_execution_time_limit_miliseconds');
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
        Schema::dropIfExists('problems');
    }
}
