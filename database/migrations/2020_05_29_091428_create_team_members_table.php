<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreateTeamMembersTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create team_members',
        'read team_members',
        'update team_members',
        'delete team_members',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->bigIncrements('id');

            // enter all non-translated columns here
            // set them to fillable in your model

            $table->string('name');

            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('team_member_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('team_member_id')->unsigned();
            $table->string('locale')->index();

            // set all columns that are translated here
            // set them to fillable in the model
            // as well as in the translation-model

            $table->string('position')->nullable();
            $table->text('profession')->nullable();

            $table->unique(['team_member_id', 'locale']);
            $table->foreign('team_member_id')->references('id')->on('team_members')->onDelete('cascade');
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
        Schema::dropIfExists('team_members');

        Schema::dropIfExists('team_member_translations');

        $this->downPermissions();
    }
}
