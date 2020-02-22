<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoveController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove the controller class';

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
        $controllerName = $this->argument('name').'.php';
        $controllerPath = base_path('app/Http/Controllers/').$controllerName;
        if(file_exists($controllerPath)){
            unlink($controllerPath);
            $this->line('Controller removed successfully.');
        }else{
            $this->line('No controller found.');
        }
    }
}
