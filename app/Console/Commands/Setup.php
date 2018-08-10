<?php

namespace App\Console\Commands;
use Artisan;

use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Everything Up fro you ';

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
    public function handle()
    {
        //
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Artisan::call('passport:install');
        $this->info('Everything is done now . You now Serve the app now ^_^');

    }
}
