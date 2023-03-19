<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();  // this is primary key
            // $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->string('is_publish')->default(false);
            $table->timestamps();  // execute two column 1. created_at 2. updated_at 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
