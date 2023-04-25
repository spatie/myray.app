<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('text');
            $table->text('formatted_text')->nullable();
            $table->text('summary');
            $table->text('preview_secret')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });

        Schema::create('authors', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('link')->nullable();
            $table->timestamps();
        });

        Schema::create('author_post', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('author_id');
            $table->foreignId('post_id');
        });
    }
};
