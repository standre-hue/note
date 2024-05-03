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
        $this->down();
        Schema::create('todos', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
        });
        Schema::dropIfExists('ratings');
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::dropIfExists('schools');
        Schema::create('schools', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->unique();
            $table->string('address');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->text('information');
            $table->timestamps();
        });
        

        Schema::dropIfExists('notess');
        Schema::create('notess', function (Blueprint $table) {
            $table->id('id');
            $table->integer('number');
            $table->string('comment');
            
           
            $table->foreignId('rating_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id('id');
            $table->string('path');
            $table->foreignId('school_id')->constrained();
            $table->timestamps();
        });

        Schema::create('school_rating', function (Blueprint $table) {
           
            $table->foreignId('school_id')->constrained();
            $table->foreignId('rating_id')->constrained();
            $table->primary(['school_id', 'rating_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
