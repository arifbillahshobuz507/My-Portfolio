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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('cv', 50)->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook', 300)->nullable()->default('https://www.facebook.com/');
            $table->string('instagram', 300)->nullable()->default('https://www.instagram.com/');
            $table->string('linkedin', 300)->nullable()->default('https://www.linkedin.com/');
            $table->string('github', 300)->nullable()->default('https://www.github.com/');
            $table->string('twitter', 300)->nullable()->default('https://www.twitter.com/');

            //  Relation User
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
