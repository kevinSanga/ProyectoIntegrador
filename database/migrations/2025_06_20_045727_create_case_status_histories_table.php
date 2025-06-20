<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('case_status_histories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('case_id')->constrained()->onDelete('cascade');
    $table->enum('status', ['pendiente', 'en_proceso', 'cerrado']);
    $table->timestamp('changed_at')->useCurrent();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_status_histories');
    }
};
