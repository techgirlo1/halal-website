<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->string('product_name');
            $table->string('product_id');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('total_price');
            $table->string('email');
            $table->string('name');
            $table->text('delivery_address');
            $table->string('state');
            $table->string('delivery_charge');
            $table->string('order_date');
            $table->string('order_time');
            $table->string('order_status');
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
        Schema::dropIfExists('cart_orders');
    }
};
