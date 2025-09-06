<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('profil');
            $table->date('datenaissance');
            $table->string('nationalité');
            $table->integer('expérience');
            $table->string('ville');
            $table->string('pays');
            $table->string('téléphone');
            $table->string('email')->unique();
            $table->string('CV')->nullable();
            $table->string('RéférenceContrat')->nullable();
            $table->string('ManifestationInt')->nullable();
            $table->date('dateenregistrement');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultants');
    }
};
