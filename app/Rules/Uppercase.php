<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class Uppercase implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value != strtoupper($value))
        {
            
        }
    }

    public function validate(string $attribute, mixed $value, Closure $fail):void
    {
        if($value!= strtoupper($value))
        {
           $fail("validation.custom.uppercase")->translate([
            'attribute'=>$attribute,
            'value'=>$value
           ]);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       
        return "ini bukan uppercase";
      
    }
}
