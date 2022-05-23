<?php

namespace App\Observers;

use App\Models\Credit;
use App\Traits\InsertInBalance;

class CreditObserver
{
    use InsertInBalance;

    public function saved(Credit $credit)
    {
        $this->insertCreditInBalance($credit);
    }
}
