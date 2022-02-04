<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_public');
            $table->unsignedInteger('type');
            $table->string('image_url', 255)->nullable();
            $table->string('prize_title');
            $table->text('prize_description');
            $table->index('start_date');
            $table->index('end_date');
            $table->index('is_public');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
