<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('tagline');
            $table->string('description');
            $table->integer('rating_us');
            $table->string('rating_visitors');
            $table->string('eligibility');
            $table->string('link');
            $table->string('payment');
            $table->string('color');
            $table->boolean('sponsored');
            $table->integer('language_id');
            $table->integer('category_id');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('words');
    }
}
