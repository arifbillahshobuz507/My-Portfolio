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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            // foregin key 
            $table->unsignedBigInteger('user_id')->unique();
            // User Relation
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
            //  Relation Project
            $table->foreignId('user_profile_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            //  Relation Experience
            $table->foreignId('experience_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            //  Relation Project
            $table->foreignId('project_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            //  Relation Project
            $table->foreignId('testimonial_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
