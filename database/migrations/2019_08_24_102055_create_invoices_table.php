<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->text('invoiceid');
            $table->text('orderid');
            $table->text('suppliername');
            $table->text('product');
            $table->text('quantity');
            $table->text('price');
            $table->text('gstpercent');
            $table->text('totalamount');
            $table->text('gstamount');

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
        Schema::dropIfExists('invoices');
    }
}
