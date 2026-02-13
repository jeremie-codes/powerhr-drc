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
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('summary')->nullable();
            $table->string('job_type')->nullable();
            $table->string('qualification_level')->nullable();
            $table->integer('years_experience')->default(0);
            $table->decimal('salary_expectation', 10, 2)->nullable();
            $table->enum('availability', ['available','busy'])->default('available');
            $table->boolean('is_certified')->default(false);
            $table->timestamp('certified_at')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profiles');
    }
};
