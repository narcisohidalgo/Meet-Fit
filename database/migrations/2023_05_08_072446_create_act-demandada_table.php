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
        Schema::create('actdemandada', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('hora')->nullable();
            $table->string('dia')->nullable();
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_lugar');
            $table->timestamps();
            $table->foreign("id_users")->references('id')->on('users')->onDelete('cascade');
            $table->foreign("id_actividad")->references('id')->on('actividad')->onDelete('cascade');
            $table->foreign("id_lugar")->references('id')->on('lugar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actdemandadas');
    }
};
