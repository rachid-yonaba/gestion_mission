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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->text('Description')->nullable();
            $table->string('type')->nullable();
            $table->string('chef')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->date('datedebut')->nullable();
            $table->date('datefin')->nullable();
            $table->text('commentaire')->nullable();
            $table->string('NomResponsable')->nullable();
            $table->string('FontionResponsable')->nullable();
            $table->string('NomClient')->nullable();
            $table->string('NomConsultant')->nullable();
            $table->integer('Nbreemployé')->nullable();
            $table->string('Adresse')->nullable();
            $table->string('téléphone')->nullable();
            $table->text('resultat')->nullable();
            $table->integer('Nbremois')->nullable();
            $table->string('Libell')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
