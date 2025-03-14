<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->string('color')->default('#000000')->nullable();
            $table->enum('position', range(1, 9))->unique();
            $table->unique('position');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('buttons');
    }
};
