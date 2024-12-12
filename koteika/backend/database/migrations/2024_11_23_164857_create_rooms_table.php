<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('square');
            $table->integer('price');
            $table->string('photo_path1')->nullable();
            $table->string('photo_path2')->nullable();
            $table->string('photo_path3')->nullable();
            $table->string('photo_path4')->nullable();
            $table->string('photo_path5')->nullable();
            $table->boolean('show_on_homepage')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
