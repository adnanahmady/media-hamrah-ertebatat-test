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
        } else {
            $this->info("Number $number is not a prime number");
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
        if (
            ($number % 2 == 0 && $number > 2) ||
            $number < 2
        ) {
            return false;
        }

        for ($i = 3; $i < $number; $i += 2) {
            if (($number - ($reminder = $number % $i)) == $number) { 
                return false;
            }
        }

        return true;
    }
}
