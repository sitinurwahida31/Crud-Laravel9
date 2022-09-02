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
        Schema::create('apoteks', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama_ob');
            $table->string('jenis_ob');
            $table->string('stok_ob');
            $table->string('harga_ob');
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
        Schema::dropIfExists('apoteks');
    }
};
