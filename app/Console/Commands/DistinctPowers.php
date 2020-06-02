<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DistinctPowers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'distinct';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets distinct numbers between a and b';

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
        $a = $this->ask('What is number a');
        $b = $this->ask('What is number b');

        $count = $this->getCount($a, $b);

        $this->info("Distinct numbers for $a and $b are: $count");
    }

    /**
     * Gets Distinct powers count
     *
     * @param int $a
     * @param int $b
     *
     * @return int
     */
    public function getCount(int $a, int $b)
    {
        $count = 0;

        for ($i = 2; $i <= $a; $i++) {
            for ($j = 2; $j <= $b; $j++) {
                if (pow($j, $i) != pow($i, $j)) {
                    $count++;
                }

                if ((pow($i, $j) == pow($j, $i) && $i < $j) OR ($i == $j)) {
                    $count++;
                }
            }
        }

        return $count;
    }
}
