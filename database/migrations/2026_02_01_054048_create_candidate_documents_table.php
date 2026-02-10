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
        Schema::create('candidate_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidate_profiles')->cascadeOnDelete();
            $table->enum('type', [
                'CV','ID','CNSS','ATTESTATION_VIE_MOEURS',
                'CERTIFICAT_MEDICAL','CARTE_TRAVAIL'
            ]);
            $table->string('file_path');
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_documents');
    }
};
