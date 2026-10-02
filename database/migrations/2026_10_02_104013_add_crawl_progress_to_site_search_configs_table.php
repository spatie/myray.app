<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_search_configs', function (Blueprint $table) {
            $table->integer('urls_found')->default(0);
            $table->integer('urls_failed')->default(0);
            $table->string('finish_reason')->nullable();
        });
    }
};
