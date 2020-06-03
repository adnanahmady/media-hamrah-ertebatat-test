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
        $this->info("Please wait...");
        $this->info("Prime number $number is: ".$this->getNumberth($number));
    }

    /**
     * returns nth prime number
     *
     * @param int $number
     *
     * @return int
     */
    public function getNumberth(int $number): int
    {
        $counter = 3;
        $prime = 2;
        $key = 1;

        while($key < $number) {
            if ($this->checkPrime($counter)) {
                $key++;
                $prime = $counter;
            }
            $counter += 2;
        }

        return $prime;
    }

    /**
     * checks if number is prime or not
     *
     * @param int $number
     *
     * @return bool
     */
    public function checkPrime(int $number): bool
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
