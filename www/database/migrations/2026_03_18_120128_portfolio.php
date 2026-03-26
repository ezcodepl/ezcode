<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');

            // np. "Laravel, Vue, Docker"
            $table->string('technology')->nullable();

            $table->string('url')->nullable();

            // nowe kolumny na obrazy
            $table->string('image_desktop')->nullable();
            $table->string('image_tablet')->nullable();
            $table->string('image_mobile')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};