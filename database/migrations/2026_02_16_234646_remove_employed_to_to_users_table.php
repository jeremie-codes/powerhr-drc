<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Supprimer la clé étrangère
            $table->dropForeign(['employed_at']);

            // Supprimer la colonne
            $table->dropColumn('employed_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('employed_at')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete()
                ->after('role');
        });
    }
};
