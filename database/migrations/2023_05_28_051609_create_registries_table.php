<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registries', function (Blueprint $table) {
            $table->id();
            $table->string('registry_number');
            $table->string('name');
            $table->unsignedInteger('nisn');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('email');
            $table->string('phone');
            $table->string('religion');
            $table->integer('sibling');
            $table->enum('sex', ['F', 'M']);
            $table->string('previous_school');
            $table->string('status');
            $table->text('notes');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('registries');
    }
}
