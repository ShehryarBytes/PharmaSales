<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('batch');
            $table->string('Product_Name');
            $table->decimal('quantity');
            $table->decimal('tax');
            $table->decimal('KG');
            $table->decimal('bonus');
            $table->date('Exp_date');
            $table->date('Mfg_date');
            $table->decimal('Cost');
            $table->decimal('T_amount');
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
        Schema::dropIfExists('products');
    }
}
