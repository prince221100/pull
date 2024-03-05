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
        Schema::create('create_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ques_message')->nullable();
            $table->string('ans_message')->nullable();
            $table->enum('prority',['high','mid','low']);
            $table->enum('status',['active','inactive','inprogress']);
            $table->foreignId('issue_id')->references('id')->on('ticket_issue')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_ticket');
    }
};
