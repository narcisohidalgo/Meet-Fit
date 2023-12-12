<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('municipio', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('cp')->unique();
            $table->string('nombre');
            $table->unsignedBigInteger('id_provincia');
            $table->timestamps();

            $table->foreign("id_provincia")->references('id')->on('provincia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipio');
    }
};
