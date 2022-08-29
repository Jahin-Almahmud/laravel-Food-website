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
        Schema::create('aboutsettings', function (Blueprint $table) {
            $table->id();
            $table->text('about_description');
            $table->string('about_image')->default('default.png');
            $table->string('about_youtube_video_backgroud_img')->default('default.png');
            $table->string('about_youtube_video_url')->nullable();
            $table->string('status')->default('hide');
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
        Schema::dropIfExists('aboutsettings');
    }
};
