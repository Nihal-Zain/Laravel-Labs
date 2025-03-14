<?php

namespace App\Rules;

use Illuminate\Support\Facades\Auth;    
use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class PostLimitRule implements Rule
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
        $user = Auth::user();
        $posts = $user->posts()->count();
        return $posts <= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You have reached the maximum number of posts.';
    }
}
