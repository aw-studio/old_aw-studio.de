<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // This is needed to delete tables of the old version
        Schema::dropIfExists('meta_translations');
        Schema::dropIfExists('meta');

        Schema::create('meta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->nullableMorphs('model');
            $table->boolean('is_edited');

            $table->timestamps();
        });

        Schema::create('meta_translations', function (Blueprint $table) {
            $table->translates('meta', 'meta_id');

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_translations');
        Schema::dropIfExists('meta');
    }
}
