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
        Schema::create('historytasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bug_id')->unsigned();
            $table->bigInteger('task_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('status',
            ['PENDING',
            'DONE', 
            'REVISION', 
            'VERIFIED'])->nullable();
            $table->text('information')->nullable();
            
            //relation
            $table->foreign('bug_id')->references('id')->on('bugs')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historytasks');
    }
};
