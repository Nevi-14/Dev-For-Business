<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_details', function (Blueprint $table) {
            $table->id();
            $table->integer('billing_id')->foreignId()->references('id')->on('billing')->onDelete('cascade');
            $table->integer('service_id')->foreignId()->references('id')->on('services')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('tax_percentage')->nullable();
            $table->integer('tax_amount')->nullable();
            $table->string('discount_code')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('subtotal_amount')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('payment_date')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('billing_details');
    }
}
