<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ResourceLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resource:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the symbolic link of resources for the admin panel';

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
     * @return mixed
     */
    public function handle():void
    {
        if(!is_link(public_path('adminAssets'))){
            File::link(resource_path('views/admin/assets'), public_path('adminAssets'));
            $this->line('The ['.resource_path('views/admin/assets').'] link has been connected to ['.public_path('adminAssets').'].');
        }else{
            $this->error('The ['.resource_path('views/admin/assets').'] link already exists.');
        }
        $this->line('The links have been created.');
    }
}
