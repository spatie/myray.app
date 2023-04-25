<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table): void {
            $table->increments('id');
            $table->morphs('model');
            $table->string('collection_name');
            $table->string('name');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->string('disk');
            $table->unsignedInteger('size');
            $table->longText('manipulations');
            $table->longText('custom_properties');
            $table->longText('responsive_images');
            $table->unsignedInteger('order_column')->nullable();
            $table->uuid()->nullable();
            $table->string('conversions_disk')->nullable();
            $table->nullableTimestamps();
        });
    }
};
