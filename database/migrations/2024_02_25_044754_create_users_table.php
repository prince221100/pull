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
        // if(!Schema::hasTable(table:'users')){
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('employee_id');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('email')->unique();
                $table->string('password');
                $table->integer('role')->comment('1:Employess,2:IT Admin,3:Manager');
                $table->unsignedBigInteger('manager_id');
                $table->string('users_department');
                $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');

                $table->timestamps();
            });
        // }

        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
