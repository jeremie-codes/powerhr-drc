<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', [
                'admin',
                'prospect',
                'client',
                'candidate',
                'employee'
            ])->default('candidate');

            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->string('langue')->nullable();

            $table->foreignId('country_id')
                ->nullable()
                ->constrained('countries')
                ->nullOnDelete();

            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamp('last_login_at')->nullable();
        });

    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['country_id']);
            $table->dropColumn([
                'role',
                'bio',
                'image',
                'country_id',
                'is_active',
                'is_deleted',
                'last_login_at',
            ]);
        });
    }
};
