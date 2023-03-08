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
        Schema::create('milestone_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('milestone_id')->constrained('contract_milestones')->onDelete('cascade');
            $table->text('file');
            $table->text('remarks')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
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
        Schema::dropIfExists('milestone_works');
    }
};
