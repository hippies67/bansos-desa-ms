<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToWebProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_profile', function (Blueprint $table) {
            $table->string('github')->nullable()->after('facebook');
            $table->string('linkedin')->nullable()->after('github');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_profile', function (Blueprint $table) {
            //
        });
    }
}
