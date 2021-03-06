<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCautionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caution', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('home_owner_id')->unsigned();
            $table->index('home_owner_id');
            $table->foreign('home_owner_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('caution_type_id')->unsigned();
            $table->index('caution_type_id');
            $table->foreign('caution_type_id')->references('id')->on('caution_type')->onDelete('cascade');

            $table->integer('homeowner_address_id')->unsigned();
            $table->index('homeowner_address_id');
            $table->foreign('homeowner_address_id')->references('id')->on('homeowner_address')->onDelete('cascade');

            $table->text('message')->nullable();
            $table->integer('status')->default(0);
            $table->dateTime('end_date')->nullable();
            $table->integer('from_chikka')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('caution');
    }
}
