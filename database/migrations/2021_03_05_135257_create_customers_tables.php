<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('url')->nullable();
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('customer_translations', function (Blueprint $table) {
            $table->translates('customers');

            $table->string('name');
            $table->string('suffix')->nullable();

            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_translations');
        Schema::dropIfExists('customers');
    }
}
