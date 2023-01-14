<?php

namespace Mariojgt\MasterStore\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Republish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'republish:master-store';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will copy the resource files from back to the package';

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

        $bar = $this->output->createProgressBar(1);
        $bar->start();

        // First we move the resources where we keep the css and js files
        $targetFolderResource = resource_path('vendor/SkeletonAdmin/js/backend/Pages/BackEnd/Vendor/MasterStore');
        $destitionResource = __DIR__.'/../../Publish/Resource/';
        File::copyDirectory($targetFolderResource, $destitionResource);
        $bar->advance(); // Little Progress bar

        $bar->finish(); // Finish the progress bar
        $this->newLine();
        $this->info('The command was successful!');
    }
}
