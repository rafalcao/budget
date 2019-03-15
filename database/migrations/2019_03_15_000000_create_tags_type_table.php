<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTypeTable extends Migration {
    public function up() {
        Schema::create('tags_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('label');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tags_type');
    }
}
