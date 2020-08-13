<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreateCustomersTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create customers',
        'read customers',
        'update customers',
        'delete customers',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            // enter all non-translated columns here
            // set them to fillable in your model

            $table->unsignedBigInteger('category_id');
            $table->string('url')->nullable();
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('customer_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->string('locale')->index();

            // set all columns that are translated here
            // set them to fillable in the model
            // as well as in the translation-model
            //
            $table->string('name');
            $table->string('suffix')->nullable();

            $table->unique(['customer_id', 'locale']);
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });


        $this->upPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');

        Schema::dropIfExists('customer_translations');

        $this->downPermissions();
    }
}
