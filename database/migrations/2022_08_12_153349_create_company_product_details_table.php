<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->foreignId()->references('id')->on('company_products')->onDelete('cascade');
            $table->integer('product_attribute')->foreignId()->references('id')->on('product_attributes')->onDelete('cascade');
            $table->string('attribute_value');
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
        Schema::dropIfExists('company_product_details');
    }
}
