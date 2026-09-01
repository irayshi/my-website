<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('review_id')->nullable()->constrained('reviews')->nullOnDelete();
            $table->foreignId('client_id')->nullable()->constrained('users');

            $table->string('name');
            $table->text('description');
            $table->string('tech_stack');
            $table->string('link_demo');
            $table->boolean('is_internal');
            $table->boolean('is_visible');
            $table->timestamp('created_at')->default(time());
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
