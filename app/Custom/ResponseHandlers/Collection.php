<?php

namespace App\Custom\ResponseHandlers;

abstract class Collection
{
    protected $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * calls related methods for filtering data
     *
     * @return array
     */
    public function handle()
    {
        return array_map(function ($item) {
            foreach($item as $key => $value) {
                if (in_array($key, $this->filters)) {
                    $item[$key] = $this->{
                        'handle' . $this->key($key)
                    }($value);
                }
            }

            return $item;
        }, $this->collection);
    }

    /**
     * returns key name in StudyCase format
     *
     * @param $key
     *
     * @return string
     */
    public function key($key)
    {
        $parts = array_map(
            function ($part) {
                return ucfirst($part);
            }
        , explode('_', $key));

        return implode('', $parts);
    }
}
