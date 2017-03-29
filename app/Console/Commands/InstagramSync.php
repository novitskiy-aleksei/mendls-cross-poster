<?php

namespace App\Console\Commands;

use App\Providers\InstaSyncProvider;
use Illuminate\Console\Command;

class InstagramSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instasync:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /** @var InstaSyncProvider */
    protected $syncProvider;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->syncProvider = app()->make('InstaSync');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->syncProvider->sync();
    }
}
