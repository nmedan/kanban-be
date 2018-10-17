<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ColumnRule implements Rule
{
    
    protected $min_value;

    public function __construct($min_value)
    {
        $this->min_value = $min_value;
    }


    public function passes($attribute, $value)
    {
        $value > $this->min_value;
    }

    public function message()
    {
        return 'The value must be greater or equal '.$min_value;
    }
}
