<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uruchom migrację dla tabeli posts.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Powiązanie z użytkownikiem (autorem)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->text('excerpt')->nullable();
            
            // Parametry dodatkowe
            $table->string('category');
            $table->string('read_time')->default('5 MIN CZYTANIA');
            
            // Status i daty
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('date_public')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Cofnij migrację.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};