<?php

namespace App\Console\Commands;

use Ignite\Crud\Models\Repeatable;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImportMediaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aw:import-media
                                {--regenerate : Regenerate missing converions}
                                {--truncate : Truncate table before importing}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import old media data.';

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
        $this->importMedia();
    }

    protected function importMedia()
    {
        if ($this->option('truncate')) {
            $this->info('Truncate media table...');

            DB::table('media')->truncate();
        }
        $medias = OldMedia::all();

        foreach ($medias as $oldmedia) {
            if ($oldmedia->model_type === 'Fjord\Crud\Models\FormField') {
                continue;
            }

            DB::update('ALTER TABLE media AUTO_INCREMENT = ' . $oldmedia->id . ';');

            $newMedia = new Media;
            $newMedia->forceFill($oldmedia->toArray());

            if ($oldmedia->model_type === 'Fjord\Crud\Models\FormBlock') {
                $newMedia->model_type = Repeatable::class;
            }

            $newMedia->conversions_disk = $oldmedia->disk;
            $props = json_decode($oldmedia->custom_properties, true);
            $defaultConversions = [
                'lg'      => true,
                'md'      => true,
                'sm'      => true,
                'xl'      => true,
                'xxl'     => true,
                'thumb'   => true,
                'preview' => true,
            ];

            $generatedConversions = array_key_exists('generated_converions', $props)
                ? $props['generated_conversions']
                : $defaultConversions;

            $newMedia->generated_conversions = json_encode($generatedConversions);

            $newMedia->custom_properties = json_encode([
                'alt'   => json_decode($oldmedia->custom_properties)->alt,
                'title' => json_decode($oldmedia->custom_properties)->title,
            ]);

            $newMedia->save();
        }
        $this->info('Imported Media');

        if ($this->option('regenerate')) {
            $this->call('media-library:regenerate', [
                '--only-missing',
            ]);
        }
    }
}

class OldMedia extends Model
{
    protected $connection = 'db_old';
    protected $table = 'media';
    protected $guarded = [];
}

class Media extends Model
{
    protected $guarded = [];
}
