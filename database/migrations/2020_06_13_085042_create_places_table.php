<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('location');
            $table->string('phone_number');
            $table->string('website')->nullable();
            $table->string('d_name')->nullable();
            $table->string('d_specialist')->nullable();
            $table->string('d_graduation')->nullable();
            $table->decimal('charges')->nullable();
            $table->text('description');
            $table->string('document')->nullable();
            $table->decimal('lng', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('state_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

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
        Schema::dropIfExists('places');
    }
}
