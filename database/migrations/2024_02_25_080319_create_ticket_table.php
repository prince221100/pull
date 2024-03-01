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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->integer('subject_type')->comment('1:Software,2:Hardware');
            $table->string('subject_name');
            $table->unsignedBigInteger('department_id');
            $table->integer('priority')->comment('1:High,2:Med,3:Low');
            $table->text('description');
            // $table->unsignedBigInteger('attachment_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->comment('1:open,2:inprogress,3:close');
            $table->date('date');
            // $table->unsignedBigInteger('respond_id');

            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            // $table->foreign('attachment_id')->references('id')->on('attachment')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('respond_id')->references('id')->on('respond_data')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
