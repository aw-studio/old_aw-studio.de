<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->text('client')->after('link_href')->nullable();
            $table->string('client_email')->after('client')->nullable();
            $table->string('client_phone')->after('client_email')->nullable();
            $table->string('client_contact_person')->after('client_phone')->nullable();
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
            $table->dropColumn('client');
            $table->dropColumn('client_email');
            $table->dropColumn('client_phone');
            $table->dropColumn('client_contact_person');
        });
    }
}
