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
        $array = [];

        for ($i = 2; $i <= $a; $i++) {
            for ($j = 2; $j <= $b; $j++) {
                if (! $this->isRepeated($array, $pow = (string) pow($i, $j))) {
                    $array[] = $pow;
                }
            }
        }

        return count($array);
    }

    /**
     * checks if item already exists in array
     *
     * @param array $array
     * @param string $item
     */
    public function isRepeated(array $array, string $item): bool
    {
        foreach ($array as $value) {
            if ($item == $value) {
                return true;
            }
        }

        return false;
    }
}
