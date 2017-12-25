<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('serial_no', 100)->unique();
            $table->string('office_serial_no', 100)->unique();
            $table->string('specification', 100)->unique();
            $table->integer('cost');
            $table->date('purchase_date');
            $table->integer('quantity');
            $table->string('status');
            $table->string('company_name');
            $table->string('company_contact');
            $table->string('description');
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
        Schema::dropIfExists('devices');
    }
}
