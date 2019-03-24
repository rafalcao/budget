<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration {
    public function up() {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('space_id');
            $table->string('name');
            $table->boolean('status');
            $table->integer('due_day')->unsigned();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('credit_cards');
    }
}
