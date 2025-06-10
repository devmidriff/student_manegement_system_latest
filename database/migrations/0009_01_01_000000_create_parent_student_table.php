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
            Schema::create('parent_student', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('parents_id');
                $table->unsignedBigInteger('student_id');
                $table->timestamps();

                $table->foreign('parents_id')->references('id')->on('parents')->onDelete('cascade');
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_student');
    }
};
