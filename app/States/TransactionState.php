<?php

namespace App\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class TransactionState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(DraftState::class)
            ->allowTransition(DraftState::class, ProcessingState::class)
            ->allowTransition(ProcessingState::class, SubmittedState::class)
        ;
    }
}
