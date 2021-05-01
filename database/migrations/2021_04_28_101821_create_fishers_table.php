<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');            
            $table->string('bi')->unique();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->text('photo')->nullable();
            $table->integer('status')->unsigned()->default(1);
            $table->date('birthday');
            $table->bigInteger('fisher_type_id')->unsigned();
            $table->foreign('fisher_type_id')->references('id')->on('fisher_types')->onDelete('cascade');
            $table->bigInteger('municipe_id')->unsigned();
            $table->foreign('municipe_id')->references('id')->on('municipes')->onDelete('cascade');
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
        Schema::dropIfExists('fishers');
    }
}
