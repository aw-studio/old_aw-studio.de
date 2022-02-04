<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ignite\Support\Migration\MigratePermissions;

class CreateLandingPagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        
        Schema::create('landing_page_translations', function (Blueprint $table) {
            $table->translates('landing_pages');

            // Set all columns that are translated here.
            // Set them to fillable in the translation Model.

            $table->string('title')->nullable();
            $table->text('text')->nullable();
            
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
        Schema::dropIfExists('landing_page_translations');
        Schema::dropIfExists('landing_pages');
    }
}
