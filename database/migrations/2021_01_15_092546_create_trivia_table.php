<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trivia', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->string('questions')->default('');
            $table->integer('userid')->default(0);
            $table->integer('category')->default(0);
            $table->integer('level')->default(0);
            $table->integer('count')->default(0);
            $table->integer('score')->default(0);
            $table->timestamp('executed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trivia');
    }
}
