<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this is a test command';

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
        $text = $this->argument("text");
        $name = $this->ask("what's your name?");
        echo "hello,".$name;
        return false;
    }
}
