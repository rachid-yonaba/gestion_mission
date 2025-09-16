<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('libelle');
            $table->text('description')->nullable();
            $table->string('chef_mission'); // Nom du chef mission
            $table->foreignId('personnel_id')->constrained('personnels')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('consultant_id')->constrained('consultants')->onDelete('cascade');
            $table->foreignId('typedemission_id')->constrained('typedemissions')->onDelete('cascade');
            $table->decimal('budget', 15, 2)->nullable();
            $table->date('datedebut');
            $table->date('datefin');
            $table->text('commentaire')->nullable();
            $table->integer('nbre_employe')->nullable();
            $table->string('resultat')->nullable();
            $table->integer('nbre_mois')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
