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
        Schema::create('respond_data', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->string('filename');
            $table->string('path');
            $table->unsignedBigInteger('ticket_id');
            $table->timestamps();
            $table->foreign('ticket_id')->references('ticket_id')->on('tickets')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respond_data');
    }
};
