<?php

namespace App\Observers;

use App\Models\Debit;
use App\Traits\InsertInBalance;

class DebitObserver
{
    use InsertInBalance;

    public function saved(Debit $debit)
    {
        $this->insertDebitInBalance($debit);
    }
}
