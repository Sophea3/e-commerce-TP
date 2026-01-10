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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Comment content (called "name" in the ERD)
            $table->string('name');

            // FK to users table (who wrote the comment)
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Polymorphic relation (Author / Article / Audience)
            $table->morphs('commentable'); // commentable_id + commentable_type

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
