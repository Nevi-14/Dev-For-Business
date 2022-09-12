<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            // Client ID > CO-hour+minute+seconds+year+month+date
            $table->string('id')->primary();//CO-17240720220911
            $table->integer('user_id')->foreignId()->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name')->unique();
            $table->string('company_phone')->unique();
            $table->string('company_email')->unique();
            $table->string('company_description')->nullable();
            $table->string('company_industry')->nullable();
            $table->string('company_terms_and_conditions')->nullable();
            $table->string('company_website_url')->unique()->nullable();
            $table->string('company_facebook_url')->unique()->nullable();
            $table->string('company_instagram_url')->unique()->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
