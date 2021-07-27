<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtypes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('imageUrl');
            $table->string('video_thumb');
            $table->string('video');
            $table->string('content');
            $table->string('order');
            $table->unsignedBigInteger('kinds_id');
            $table->foreign('kinds_id')->references('id')->on('kinds');
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
        Schema::dropIfExists('subtypes');
    }
}
