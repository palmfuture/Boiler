<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('amount')->unsigned()->index();
            $table->integer('price');
            $table->enum('status',['0','1'])->default('0');
            $table->text('remark')->nullable();
            $table->date('transaction_date');
            $table->datetime('transactioncomplete_date')->nullable();
            $table->integer('count_print')->default('0');
            $table->timestamps();
        });

        Schema::table('salses',function(Blueprint $table){
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salses');
    }
}
