<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreateReferencesTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create references',
        'read references',
        'update references',
        'delete references',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->bigIncrements('id');

            // enter all non-translated columns here
            // set them to fillable in your model

            $table->string('link_href')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('reference_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reference_id')->unsigned();
            $table->string('locale')->index();

            // set all columns that are translated here
            // set them to fillable in the model
            // as well as in the translation-model
            //
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('buzzwords')->nullable();
            $table->text('text')->nullable();
            $table->string('link_text')->nullable();

            $table->string('slug')->nullable();

            $table->unique(['reference_id', 'locale']);
            $table->foreign('reference_id')->references('id')->on('references')->onDelete('cascade');
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
        Schema::dropIfExists('references');

        Schema::dropIfExists('reference_translations');

        $this->downPermissions();
    }
}
