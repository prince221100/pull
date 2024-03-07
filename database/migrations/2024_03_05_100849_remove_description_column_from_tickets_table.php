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
        Schema::table('tickets', function (Blueprint $table) {
            // $table->integer('department_id')->unsigned();
            // $table->string('ques_message')->nullable();
            // $table->string('ans_message')->nullable();
            // $table->enum('prority',['high','mid','low']);
            // $table->enum('status',['active','inactive','inprogress']);
            // $table->foreign('issue_id')->references('id')->on('ticket_issues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn('priority');
            $table->dropColumn('description');
            $table->dropColumn('status');
            $table->dropColumn('department_id');
        });
    }
};
