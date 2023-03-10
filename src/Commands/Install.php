<?php

namespace Mariojgt\MasterStore\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Mariojgt\MasterStore\Database\Seeders\NavigationSeeder;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:master-store';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will install master-store package';

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
        // Call migrations
        Artisan::call('install:skeleton-admin');

        // Publish the media library package
        Artisan::call('vendor:publish', [
            '--provider' => 'Mariojgt\MasterStore\MasterStoreProvider',
            '--force'    => true,
        ]);

        // Run the database seeder
        Artisan::call('db:seed', [
            '--class' => NavigationSeeder::class,
        ]);
    }
}
