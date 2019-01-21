<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSymulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symulations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('garment_size_id')->unsigned();
            $table->integer('avatar_id')->unsigned();
            $table->string('s3_url_garment_json')->nullable();
            $table->string('s3_url_garment_preview_json')->nullable();
            $table->string('s3_url_garment_usdz')->nullable();
            $table->string('s3_url_garment_metadata_json')->nullable();
            $table->foreign('garment_size_id')->references('id')->on('garment_sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('avatar_id')->references('id')->on('avatars')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('symulations');
    }
}
