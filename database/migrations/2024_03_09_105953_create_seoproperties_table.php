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
        Schema::create('seoproperties', function (Blueprint $table) {
            $table->id();
            $table->enum('page',['home','resume','skill','contact','jobs']);
            $table->string('title', 100);
            $table->string('keyword', 100);
            $table->text('description');
            $table->string('ogSiteName', 100);
            $table->string('ogUrl', 100);
            $table->string('ogTitle', 100);
            $table->longText('ogDescription');
            $table->string('ogImage', 300);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seoproperties');
    }
};
