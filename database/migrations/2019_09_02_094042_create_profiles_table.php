<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('spec')->nullable();
            $table->string('grad')->nullable();
            $table->text('ehistory')->nullable();
            $table->text('whistory')->nullable();
            $table->string('experience')->nullable();
            $table->string('employment')->nullable();
            $table->string('role')->nullable();
            $table->text('skills')->nullable();
            $table->text('hobbies')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('mentor')->default(0);
            $table->integer('category_id')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
}
