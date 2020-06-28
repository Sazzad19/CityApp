<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_id');
            $table->string('interstitial_id')->default('null');
            $table->string('banner_id')->default('null');
            $table->string('native_id')->default('null');
            $table->string('image_path')->default('null');
            $table->string('url')->default('null');
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('admobs');
    }
}
