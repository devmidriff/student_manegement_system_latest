<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::create('teachers', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');


                    // Personal Information
                    $table->string('phone');
                    
                    // Professional Information
                    $table->string('qualification')->nullable();
                    $table->string('specialization')->nullable();
                    $table->integer('experience')->nullable();
                    $table->string('subjects')->nullable();
                    $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
