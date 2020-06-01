<?php

namespace App\Custom\ResponseHandlers;

class CurrencyCollection extends Collection
{
    protected $filters = [
        'last_updated',
        'date_added',
        'tags',
        'platform',
        'quote'
    ];

    public function handleLastUpdated($value): string
    {
        return jdate($value)->ago();
    }

    public function handleDateAdded($value): string
    {
        return jdate($value)->ago();
    }

    public function handleTags($value): string
    {
        return implode('|', $value);
    }

    public function handlePlatform($value): string
    {
        return $value ? $value['name'] : '';
    }

    public function handleQuote($quote): string
    {
        if ($quote === null) {
            return $quote;
        }

        foreach($quote as $key => $value) {
            return "$key {$value['price']}";
        }
    }
}
