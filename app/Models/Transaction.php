<?php

namespace App\Models;

use App\States\DraftState;
use App\States\PaymentFailedState;
use App\States\TransactionState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;
use Spatie\ModelStates\State;

class Transaction extends Model
{
    use HasFactory;
    use HasStates;

    protected $casts = [
        'state' => TransactionState::class,
        'state_data' => 'object',
    ];

    public function setStateAttribute($state): void
    {
        $this->attributes['state'] = $state::$name;

        if ( ! in_array(State::resolveStateClass($state), [PaymentFailedState::$name])) {
            $this->state_data = null;
        }
    }
}
