<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('country_code')->nullable();
            $table->string('area_code')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('avatar')->default(true);
            $table->boolean('status')->default(true);
            $table->boolean('google_sign_in')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('last_login')->nullable();
            $table->integer('login_attempts')->nullable();
            $table->string('status_notes')->nullable();
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
        Schema::dropIfExists('users');
    }
}
