<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ignite\Support\Migration\MigratePermissions;

class CreateTechnologiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('version')->nullable();
        });
        
        Schema::create('technology_translations', function (Blueprint $table) {
            $table->translates('technologies');

            // Set all columns that are translated here.
            // Set them to fillable in the translation Model.

            $table->string('name');
            $table->text('text')->nullable();
            $table->string('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technology_translations');
        Schema::dropIfExists('technologies');
    }
}
