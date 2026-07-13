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
            $table->string('image')->nullable()->comment('profile image');
            $table->string('cover_image')->nullable()->comment('cover image');
            $table->text('description')->nullable();
            $table->string('cv', 50)->nullable();
            $table->string('organization')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->string('language')->nullable();
            $table->string('facebook', 100)->nullable()->default('https://www.facebook.com/');
            $table->string('instagram', 100)->nullable()->default('https://www.instagram.com/');
            $table->string('linkedin', 100)->nullable()->default('https://www.linkedin.com/');
            $table->string('github', 100)->nullable()->default('https://www.github.com/');
            $table->string('twitter', 100)->nullable()->default('https://www.twitter.com/');
            $table->string('key', 30)->nullable();
            $table->text('value')->nullable();
            $table->string('designation', 100)->nullable();
            //Relation User
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
