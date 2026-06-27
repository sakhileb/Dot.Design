<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('design_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('type')->default('graphic');
            $table->unsignedInteger('width')->default(1200);
            $table->unsignedInteger('height')->default(628);
            $table->string('unit')->default('px');
            $table->timestamps();
        });

        Schema::create('design_canvases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('design_project_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('page_number')->default(1);
            $table->json('elements')->nullable();
            $table->string('background_color', 7)->default('#ffffff');
            $table->string('background_image')->nullable();
            $table->timestamps();
        });

        Schema::create('design_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('type')->default('image');
            $table->string('file_path');
            $table->string('mime_type')->nullable();
            $table->unsignedInteger('file_size')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        Schema::create('ai_generation_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('design_project_id')->nullable()->constrained()->nullOnDelete();
            $table->text('prompt');
            $table->string('result_url')->nullable();
            $table->string('provider')->default('anthropic');
            $table->unsignedInteger('tokens_used')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_generation_logs');
        Schema::dropIfExists('design_assets');
        Schema::dropIfExists('design_canvases');
        Schema::dropIfExists('design_projects');
    }
};
