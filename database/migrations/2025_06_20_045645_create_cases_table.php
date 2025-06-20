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
        Schema::create('cases', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->foreignId('client_id')->constrained()->onDelete('cascade');
    $table->enum('status', ['pendiente', 'en_proceso', 'cerrado'])->default('pendiente');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function client() {
    return $this->belongsTo(Client::class);
}


};
