<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            // Administrador que creó la categoría (catálogo global)
            $table->foreignId('admin_id')->nullable()->constrained('admins')->nullOnDelete();
            $table->string('name');
            $table->string('type'); // income | expense
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();

            $table->unique(['name', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
