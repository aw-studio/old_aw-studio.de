<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();

            $table->string('link_href')->nullable();
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('reference_translations', function (Blueprint $table) {
            $table->translates('references');

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('buzzwords')->nullable();
            $table->text('text')->nullable();
            $table->string('link_text')->nullable();

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
        Schema::dropIfExists('reference_translations');
        Schema::dropIfExists('references');
    }
}
