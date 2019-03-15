<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsSampleTable extends Migration {
    public function up() {
        Schema::create('tags_sample', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tags_sample');
    }
}
