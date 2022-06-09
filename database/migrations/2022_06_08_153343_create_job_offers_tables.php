<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOffersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('active')->default(true);
        });

        Schema::create('job_offer_translations', function (Blueprint $table) {
            $table->translates('job_offers');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_offer_translations');
        Schema::dropIfExists('job_offers');
    }
}
