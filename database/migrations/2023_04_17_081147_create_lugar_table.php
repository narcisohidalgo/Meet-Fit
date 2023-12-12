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
        Schema::create('lugar', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('nombre');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('tipo');
            $table->unsignedBigInteger('id_municipio');
            $table->timestamps();

            $table->foreign("id_municipio")->references('id')->on('municipio')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugar');
    }
};
