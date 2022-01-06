<?php

namespace App\Rules;

use App\Models\Credibility as ModelsCredibility;
use Illuminate\Contracts\Validation\Rule;

class Credibility implements Rule
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
        $cr = ModelsCredibility::where([
            ['code', $value],
            ['used_by', null]
        ])->first();

        return $cr ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Credibility Code is invalid or already used';
    }
}
