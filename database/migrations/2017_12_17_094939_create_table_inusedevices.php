<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInusedevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inusedevices', function(Blueprint $table){
            $table->increments('id');
            $table->integer('item_id');
            $table->integer('request_id');
            $table->date('submission_date');
            $table->boolean('clearanced')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inusedevices');
    }
}
