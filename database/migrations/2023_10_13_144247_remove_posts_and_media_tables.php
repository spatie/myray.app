<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::drop('posts');
        Schema::drop('authors');
        Schema::drop('author_post');
        Schema::drop('media');
    }
};
