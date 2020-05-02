<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMobilePhonesToMobilephones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobilePhones', function (Blueprint $table) {
            Schema::rename('mobilePhones', 'mobilephones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobilePhones', function (Blueprint $table) {
            //
        });
    }
}
