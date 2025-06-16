<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goals', function (Blueprint $table){
            $table->id(); 
            $table->string('title');
            $table->text('description')->nullable(); 
            $table->enum('goal_type', ['daily', 'weekly', 'monthly']);
            $table->date('start_date')->nullable(); 
            $table->date('end_date')->nullable(); 
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
