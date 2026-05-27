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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 100)->nullable();
            $table->string('email');
            $table->string('phone');
            $table->text('description')->nullable();

            // foregin key 
            $table->unsignedBigInteger('service_id')->unique();
            // User Relation
            $table->foreign('service_id')->references('id')->on('services')->restrictOnDelete()->cascadeOnUpdate();
            //  Relation User
            $table->foreignId('user_profile_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
