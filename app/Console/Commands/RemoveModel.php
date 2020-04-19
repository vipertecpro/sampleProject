<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoveModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove the model class';

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
        $modelName = $this->argument('name').'.php';
        $modelPath = base_path('app/').$modelName;
        if(file_exists($modelPath)){
            unlink($modelPath);
            $this->line('Model removed successfully.');
        }else{
            $this->line('No controller found.');
        }
    }
}
