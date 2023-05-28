<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('nisn');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('email');
            $table->string('phone');
            $table->string('relation_type');
            $table->enum('sex', ['F', 'M']);
            $table->unsignedBigInteger('registry_id');
            $table->timestamps();
            $table->foreign('registry_id')->references('id')->on('registries')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
