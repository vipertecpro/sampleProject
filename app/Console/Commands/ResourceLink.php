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
    protected $description = 'Create the symbolic link of resources for the application';

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
        File::link(resource_path('views/admin/assets'), public_path('adminAssets'));
//        $controllerName = $this->argument('name').'.php';
//        $controllerPath = base_path('app/Http/Controllers/').$controllerName;
//
//        if(file_exists($controllerPath)){
//            $this->line('Controller removed successfully.');
//        }else{
//            $this->line('No controller found.');
//        }
    }
}
