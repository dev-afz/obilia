<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
        id INT NN
title VARCHAR NN
slug VARCHAR NN
description VARCHAR NN
payment_type ENUM NN
work_hours FLOAT
project_length FLOAT NN
size ENUM NN
visibility ENUM NN
country VARCHAR NN
rate_from FLOAT NN
rate_to FLOAT NN
experience_levels_id INT NN
sub_categories_id INT NN
*/

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->enum('payment_type', ['fixed', 'hourly']);
            $table->float('work_hours')->nullable();
            $table->float('project_length')->comment('in months');
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('visibility', ['public', 'private', 'hidden']);
            $table->string('country');
            $table->float('rate_from');
            $table->float('rate_to');
            $table->foreignId('experience_level_id')->nullable()->constrained('experience_levels')->nullOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->nullOnDelete();
            $table->string('metadata', 500)->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
