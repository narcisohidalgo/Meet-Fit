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
        Schema::create('participante', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('id_actdemandada');
            $table->unsignedBigInteger('id_users');
            $table->timestamps();
            $table->foreign("id_users")->references('id')->on('users')->onDelete('cascade');
            $table->foreign("id_actdemandada")->references('id')->on('actdemandada')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participante');
    }
};
