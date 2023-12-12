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
        Schema::create('act-lugar', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('id_lugar');
            $table->timestamps();
            $table->foreign("id_lugar")->references('id')->on('lugar')->onDelete('cascade');
            $table->foreign("id_actividad")->references('id')->on('actividad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('act-lugar');
    }
};
