<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\voter;

class UniquePhone implements Rule
{
    protected $ignoreVoterId;

    public function __construct($ignoreVoterId = null)
    {
        $this->ignoreVoterId = $ignoreVoterId;
    }

    public function passes($attribute, $value)
    {
        // Check if the phone number already exists in the Voter model,
        $query = voter::where('phone', $value);
        if ($this->ignoreVoterId !== null) {
            $query->where('id', '!=', $this->ignoreVoterId);
        }

        return ($query->count() === 0);
    }

    public function message()
    {
        return 'The phone number has already been taken.';
    }
}
