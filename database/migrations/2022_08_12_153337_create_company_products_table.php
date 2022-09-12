<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('company_id')->foreignId()->references('id')->on('companies')->onDelete('cascade');
            $table->integer('category_id')->foreignId()->references('id')->on('categories')->onDelete('cascade');
            $table->integer('subcategory_id')->foreignId()->references('id')->on('subcategories')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('tax_percentage')->nullable();
            $table->integer('tax_amount')->nullable();
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
        Schema::dropIfExists('company_products');
    }
}
