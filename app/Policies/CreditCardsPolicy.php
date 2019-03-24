<?php

namespace App\Policies;

use App\User;
use App\CreditCards;

class CreditCardsPolicy {
    public function view(User $user, CreditCards $creditCard) {
        return $user->spaces->contains(
            $creditCard->space_id
        );
    }

    public function edit(User $user, CreditCards $creditCard) {
        return $user->spaces->contains(
            $creditCard->space_id
        );
    }

    public function update(User $user, CreditCards $creditCard) {
        return $user->spaces->contains(
            $creditCard->space_id
        );
    }

    public function delete(User $user, CreditCards $creditCard) {
        return $user->spaces->contains(
            $creditCard->space_id
        );
    }

    public function restore(User $user, CreditCards $creditCard) {
        return $user->spaces->contains(
            $creditCard->space_id
        );
    }
}
