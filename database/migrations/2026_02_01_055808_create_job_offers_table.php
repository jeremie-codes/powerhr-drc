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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description');
            $table->string('location');

            $table->enum('contract_type', [
                'Temps plein',
                'Temps partiel',
                'CDI',
                'CDD',
                'Stage',
                'Apprentissage',
                'Autre'
            ])->nullable();

            $table->integer('experience_years')->nullable();
            $table->decimal('salary', 12, 2)->nullable();

            $table->date('expires_at')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
