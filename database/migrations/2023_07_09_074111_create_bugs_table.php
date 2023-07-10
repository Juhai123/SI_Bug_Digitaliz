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
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->enum('status',
            ['PENDING',
            'ON PROGRESS', 
            'DONE', 
            'VERIFICATION'])->nullable();
            $table->enum('priority',
            ['LOW',
            'MEDIUM', 
            'HIGH']);
            $table->integer('progress')->nullable();
            $table->text('information')->nullable();
            
             //relation
             $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bugs');
    }
};
