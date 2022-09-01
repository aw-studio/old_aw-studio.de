<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->date('duration_from')->nullable()->after('date');
            $table->date('duration_to')->nullable()->after('duration_from');
            $table->unsignedInteger('budget')->nullable()->after('duration_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->dropColumn('duration_from');
            $table->dropColumn('duration_to');
            $table->dropColumn('budget');
        });
    }
}
