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
        Schema::create('package_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('commission')->default(15);
            $table->integer('application_limit')->default(20);
            $table->integer('connection_limit')->default(5);
            $table->float('workspace_space_limit', 10, 2)->default(5120)->comment('in MB');
            $table->integer('service_limit')->default(5)->comment('how many services can be created by provider every month');
            $table->json('client_benefits')->nullable()->comment('benefits by bringing clients');
            $table->timestamp('last_reset')->nullable()->comment('last reset date for re-filling the limits');

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
        Schema::dropIfExists('package_balances');
    }
};
