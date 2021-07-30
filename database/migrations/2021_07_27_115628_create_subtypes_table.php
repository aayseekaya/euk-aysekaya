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
            $table->string('title')->nullable();
            $table->string('imageUrl');
            $table->string('product_receipt')->nullable();
            $table->string('video_thumb')->nullable();
            $table->string('video')->nullable();
            $table->text('content');
            $table->text('use');
            $table->text('tuber_color')->nullable();
            $table->text('tuber_shell')->nullable();
            $table->text('dry_matter_ratio')->nullable();
            $table->text('bump_feature')->nullable();
            $table->text('eye_depth')->nullable();
            $table->text('bump_size')->nullable();
            $table->text('productivity')->nullable();
            $table->text('maturity_period')->nullable();
            $table->text('flowering_ınterval')->nullable();
            $table->text('flower_color')->nullable();
            $table->text('green_evening_ıntensity')->nullable();
            $table->text('late_blight')->nullable();
            $table->text('dry_rot')->nullable();
            $table->text('yn_virus')->nullable();
            $table->text('yntn_virus')->nullable();
            $table->text('virüs_x')->nullable();
            $table->text('tobacco_ring_virus')->nullable();
            $table->text('golden_cyst_nematode')->nullable();
            $table->text('ro1_and_ro4')->nullable();
            $table->text('white_nematode')->nullable();
            $table->text('dormancy_process')->nullable();
            $table->text('planting_suggestions')->nullable();
            $table->string('order')->default("0");
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
