<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BloggersRatingTableCreated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogger_rating', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blogger_id');
            $table->float('rating')->default(0);
            $table->timestamps();
        });

        Schema::table('blogger_rating', function($table) {
            $table->foreign('blogger_id')->references('id')->on('bloggers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogger_rating');
    }
}
