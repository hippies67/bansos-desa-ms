<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefDivisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_divisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('level')->default(1);
            $table->string('uraian')->nullable();
            $table->enum('status',['Y','T'])->default('Y');
            $table->unsignedBigInteger('id_induk')->nullable();
            $table->foreign('id_induk')->references('id')->on('ref_divisi');
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
        Schema::dropIfExists('ref_divisi');
    }
}
