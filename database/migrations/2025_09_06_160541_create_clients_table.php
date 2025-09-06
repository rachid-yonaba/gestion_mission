<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('NomResponsable');
            $table->string('FonctionResponsable');
            $table->string('Structure');
            $table->date('datedebut');
            $table->date('datefin');
            $table->text('InfoFinancière')->nullable();
            $table->string('RéférenceContrat')->nullable();
            $table->text('ManifestationIntéret')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
