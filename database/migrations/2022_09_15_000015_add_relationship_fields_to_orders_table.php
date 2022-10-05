<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id', 'payment_fk_7317602')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->foreign('shipping_id', 'shipping_fk_7317603')->references('id')->on('shipping_types');
            $table->unsignedBigInteger('updatedby_id')->nullable();
            $table->foreign('updatedby_id', 'updatedby_fk_7317605')->references('id')->on('users');
        });
    }
}
