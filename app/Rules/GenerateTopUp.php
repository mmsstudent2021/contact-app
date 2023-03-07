<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GenerateTopUp implements Rule
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
       return (in_array($value, [1000, 3000, 5000]));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The generate amount type should be 1000 or 3000 or 5000';
    }
}
