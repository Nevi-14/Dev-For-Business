<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->string('company_id')->foreignId()->references('id')->on('companies')->onDelete('cascade');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('total_services')->nullable();
            $table->string('description')->nullable();
            $table->integer('tax_amount')->nullable();
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
        Schema::dropIfExists('billing');
    }
}
