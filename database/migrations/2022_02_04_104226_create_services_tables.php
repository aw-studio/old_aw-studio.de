<?php

use Ignite\Support\Migration\MigratePermissions;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('service_translations', function (Blueprint $table) {
            $table->translates('services');

            // Set all columns that are translated here.
            // Set them to fillable in the translation Model.

            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->text('list')->nullable();

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
        Schema::dropIfExists('service_translations');
        Schema::dropIfExists('services');
    }
}
