<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
// use Illuminate\Contracts\Validation\ValidatorRule;


class RegistrationRule implements Rule,DataAwareRule,ValidatorAwareRule //,ValidatorRule
{
    private  $data; //bisa jugu pakai array $data
    private  $validator;

    public function setData( $data): RegistrationRule
    {
        $this->data = $data;
        return $this;
    }

    public function setValidator( $validator): RegistrationRule
    {
        $this->validator = $validator;
        return $this;
    }


    public function validate(string $attribute,mixed $value ,Closure $fail):void
    {
        $password = $value;
        $username = $this->data['name'];

        if($password == $username)
        {
            $fail($attribute. 'tidak boleh sama');
        }
    }


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
        $password = $value;
        $username = $this->data['name'];

        if($password == $username)
        {
            
        }
    }

   

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'password tidak boleh sama dengan username';
    }
}
