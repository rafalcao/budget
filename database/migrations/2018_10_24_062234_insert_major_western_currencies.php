<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertMajorWesternCurrencies extends Migration {
    public function up() {
        DB::table('currencies')->insert([
            [
                'name' => 'Real Brasileiro',
                'symbol' => 'R&dollar;'
            ]
        ]);
    }

    public function down() {
        //
    }
}
