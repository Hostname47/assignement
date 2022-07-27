<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function add(User $user) {
        /**
         * Since this is an assignement and I did not implement any authentication
         * , means I cannot using policies to handle authorization since any policy method
         * required the user to be authenticated
         */
    }
}
