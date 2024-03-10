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
            $table->string('first_name',50);
            $table->string('last_name',50)->nullable();
            $table->string('email',100);
            $table->string('phone')->min(11)->max(14);
            $table->text('message');           
           // Relation services
           $table->foreignId('service_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();                
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
