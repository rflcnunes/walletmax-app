<?php

namespace App\Traits;

use App\Models\Balance;
use App\Services\DebitService;

trait InsertInBalance
{
    private $debitService;

    public function __construct(DebitService $debitService)
    {
        $this->debitService = $debitService;
    }

    public function insertDebitInBalance($debit)
    {
        $id = $debit->user_id;

        $actualValue = $this->debitService
            ->getDebitRepository()
            ->getBalance($id);

        $oldValue = $actualValue - $debit->value;

        $actualDate = date('Y-m-d');

        $balance = new Balance();
        $balance->user_id = $debit->user_id;
        $balance->type = 'Debit';
        $balance->value = $debit->value;
        $balance->total_before_transaction = $oldValue;
        $balance->total_after_transaction = $actualValue;
        $balance->date = $actualDate;
        $balance->save();
    }
}
