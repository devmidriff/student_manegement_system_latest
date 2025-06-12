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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('class')->nullable();

            


            $table->string('roll_no');
             // Personal Information
            $table->string('dob');
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            // Academic Information
            $table->string('admission_date');
            $table->string('admission_number')->nullable();
            $table->string('section')->nullable();
            $table->string('roll_number')->nullable();
            $table->string('house')->nullable();
            
            // Guardian Information
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_email')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_email')->nullable();
            $table->text('guardian_address')->nullable();


            // Document Paths
            $table->string('photo_path')->nullable();
            $table->string('birth_certificate_path')->nullable();
            $table->string('aadhar_card_path')->nullable();
            $table->string('previous_report_card_path')->nullable();
            

            $table->timestamps();




            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
