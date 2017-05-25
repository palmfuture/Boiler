<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->integer('zone_id')->nullable()->unsigned()->index();
            $table->integer('team_id')->nullable()->unsigned()->index();
            $table->integer('group_id')->nullable()->unsigned()->index();
            $table->integer('address_id')->nullable()->unsigned()->index();
            $table->integer('deposit_unit');
            $table->integer('deposit_price');
            $table->string('ship_number',100)->nullable();
            $table->double('vat',15,8)->default('0');
            $table->enum('pay_date',['1','25'])->default('1');
            $table->date('date');
            $table->enum('status',['0','1'])->default('0');;
            $table->enum('type',['cash','credit'])->default('cash');
            $table->double('latitude',15,8)->nullable();
            $table->double('longitude',15,8)->nullable();
            $table->timestamps();
        });

        Schema::table('customers',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
