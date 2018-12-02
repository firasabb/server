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
            $table->string('title');
            $table->string('tagline');
            $table->longText('description');
            $table->integer('rating_us');
            $table->string('rating_visitors');
            $table->longText('eligibility');
            $table->string('androidlink');
            $table->string('ioslink');
            $table->longText('payment');
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
