<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('web_logo')->nullable();
            $table->string('web_icon')->nullable();
            $table->string('web_name')->nullable();
            $table->string('web_desk')->nullable();
            $table->string('web_title')->nullable();
            $table->string('web_meta')->nullable();
            $table->string('web_front_image')->nullable();
            $table->string('web_footer')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
