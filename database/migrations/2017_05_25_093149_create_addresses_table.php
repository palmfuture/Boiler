<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('addr_no')->nullable();
            $table->string('addr_village_no')->nullable();
            $table->string('addr_village')->nullable();
            $table->string('addr_road')->nullable();
            $table->string('addr_soi')->nullable();
            $table->string('addr_subdistrict')->nullable();
            $table->string('addr_district')->nullable();
            $table->string('addr_province')->nullable();
            $table->string('addr_postcode')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
