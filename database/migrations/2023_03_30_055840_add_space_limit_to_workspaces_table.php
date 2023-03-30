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
        Schema::table('workspaces', function (Blueprint $table) {
            $table->float('space_limit')->default(5120)
                ->after('slug')
                ->comment('in MB');
            $table->float('remaining_space')->default(5120)
                ->after('space_limit')
                ->comment('in MB');

            $table->float('commission')->default(15)
                ->after('remaining_space')
                ->comment('in %');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workspaces', function (Blueprint $table) {
            //
        });
    }
};
