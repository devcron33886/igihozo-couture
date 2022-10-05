<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTypesTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
