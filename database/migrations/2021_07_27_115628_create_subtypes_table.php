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
            $table->string('title');
            $table->string('imageUrl');
            $table->string('product_receipt');
            $table->string('video_thumb');
            $table->string('video');
            $table->text('content');
            $table->text('use');
            $table->text('tuber_color');
            $table->text('tuber_shell');
            $table->text('dry_matter_ratio');
            $table->text('bump_feature');
            $table->text('eye_depth');
            $table->text('bump_size');
            $table->text('productivity');
            $table->text('maturity_period');
            $table->text('flowering_ınterval');
            $table->text('flower_color');
            $table->text('green_evening_ıntensity');
            $table->text('late_blight');
            $table->text('dry_rot');
            $table->text('yn_virus');
            $table->text('yntn_virus');
            $table->text('virüs_x');
            $table->text('tobacco_ring_virus');
            $table->text('golden_cyst_nematode');
            $table->text('ro1_and_ro4');
            $table->text('white_nematode');
            $table->text('dormancy_process');
            $table->text('planting_suggestions');
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
