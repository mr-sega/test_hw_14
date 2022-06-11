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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ads_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ads_id');
            $table->foreignId('tags_id');
            $table->timestamps();

            $table->foreign('ads_id')->references('id')->on('ads');
            $table->foreign('tags_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads_tags', function (Blueprint $table){
           $table->dropForeign('tags_id');
           $table->dropForeign('ads_id');
        });

        Schema::dropIfExists('ads_tags');

        Schema::dropIfExists('tags');
    }
};
