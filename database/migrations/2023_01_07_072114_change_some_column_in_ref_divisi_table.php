<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSomeColumnInRefDivisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_divisi', function (Blueprint $table) {
            $table->dropColumn('tahun');
            $table->unsignedBigInteger('ref_periode_id')->nullable()->after('id_induk');
            $table->foreign('ref_periode_id')->references('id')->on('ref_periode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_divisi', function (Blueprint $table) {
            //
        });
    }
}
