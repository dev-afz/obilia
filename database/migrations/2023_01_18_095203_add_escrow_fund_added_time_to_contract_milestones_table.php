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
            $table->timestamp('escrow_fund_added_time')->nullable()->after('status');
            $table->timestamp('escrow_fund_released_time')->nullable()->after('escrow_fund_added_time');
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
