<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Prime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get prime number';

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
     */
    public function handle()
    {
        $number = $this->ask('What is your number?');

        if ($this->checkPrime($number)) {
            $this->info("Number $number is a prime number");
        }
    }

    /**
     * checks if number is prime or not
     *
     * @param $number
     *
     * @return bool
     */
    public function checkPrime($number)
    {
        $divisions = [2, 3, 5, 7, 11];

        foreach ($divisions as $division) {
            if (!is_float($number / $division)) {
                $this->info("Number $number is not a prime number");

                return false;
            }
        }

        return true;
    }
}