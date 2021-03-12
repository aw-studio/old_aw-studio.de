<?php

namespace App\Console\Commands;

use App\Models\Reference;
use App\Models\Translations\ReferenceTranslation;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportReferencesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aw:import-references';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import old references data.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->importReferences();
        $this->importReferencesRepeatables();
    }

    protected function importReferences()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('references')->truncate();
        DB::table('reference_translations')->truncate();
        Schema::enableForeignKeyConstraints();

        $oldReferences = OldReferences::all();
        foreach ($oldReferences as $old) {
            DB::update('ALTER TABLE `references` AUTO_INCREMENT = ' . $old->id . ';');
            $new = new Reference();
            $new->forceFill($old->toArray());
            $new->save();
        }
        $this->info('Imported References');

        $oldReferenceTranslations = OldReferenceTranslations::all();
        foreach ($oldReferenceTranslations as $old) {
            DB::update('ALTER TABLE `reference_translations` AUTO_INCREMENT = ' . $old->id . ';');

            $new = new ReferenceTranslation();
            $new->forceFill($old->toArray());
            $new->save();
        }
        $this->info('Imported Reference Translations');
    }

    protected function importReferencesRepeatables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('lit_repeatables')->truncate();
        Schema::enableForeignKeyConstraints();

        $oldReferenceDetails = FormBlocks::where('model_type', 'App\Models\Reference')->get();

        foreach ($oldReferenceDetails as $old) {
            DB::update('ALTER TABLE lit_repeatables AUTO_INCREMENT = ' . $old->id . ';');
            $new = new LitRepeatable();

            $new->form_type = 'show';
            $new->config_type = \Lit\Config\Crud\ReferenceConfig::class;
            $new->forceFill($old->toArray());

            $new->save();
        }
        $this->info('Imported References');
    }
}

class LitRepeatable extends Model
{
    protected $guarded = [];
}
class OldReferences extends Model
{
    protected $connection = 'db_old';
    protected $table = 'references';
    protected $guarded = [];
    protected $translationModel = OldReferenceTranslations::class;
}

class OldReferenceTranslations extends Model
{
    protected $connection = 'db_old';
    protected $table = 'reference_translations';
    protected $guarded = [];
}

class FormBlocks extends Model
{
    protected $connection = 'db_old';
    protected $table = 'form_blocks';
    protected $guarded = [];
}
