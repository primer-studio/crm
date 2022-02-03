<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('threads', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('models', function (Blueprint $table) {
            //
        });
    }
}
