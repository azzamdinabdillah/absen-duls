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
        Schema::create('absentable', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->string('note')->nullable();
            $table->date('absenMasuk');
            $table->date('absenKeluar')->nullable();
            $table->time('jamMasuk');
            $table->time('jamKeluar')->nullable();
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('absentable');
    }
};
