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
        Schema::table('contract_milestones', function (Blueprint $table) {
            $table->timestamp('due_date')->nullable()->after('status');
            $table->timestamp('completed_at')->nullable()->after('due_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contract_milestones', function (Blueprint $table) {
            //
        });
    }
};
