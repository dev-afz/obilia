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
        Schema::table('package_balances', function (Blueprint $table) {
            $table->integer('active_workspace_limit')
                ->after('connection_limit')
                ->default(3)
                ->comment('how many active workspaces can be created by provider every month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_balances', function (Blueprint $table) {
            //
        });
    }
};
