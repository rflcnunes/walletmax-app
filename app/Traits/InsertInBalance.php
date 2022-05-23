<?php

namespace App\Traits;

use App\Models\Balance;
use App\Services\BalanceService;
use App\Services\CreditService;
use App\Services\DebitService;

trait InsertInBalance
{
    private $debitService;
    private $creditService;
    private $balanceService;

    public function __construct(DebitService $debitService, CreditService $creditService, BalanceService $balanceService)
    {
        $this->debitService = $debitService;
        $this->creditService = $creditService;
        $this->balanceService = $balanceService;
    }

    public function insertDebitInBalance($debit)
    {
        $actualDate = date('Y-m-d');

        $balance = new Balance();
        $balance->user_id = $debit->user_id;
        $balance->type = 'Debit';
        $balance->value = $debit->value;
        $balance->date = $actualDate;
        $balance->save();
    }

    public function insertCreditInBalance($credit)
    {
        $actualDate = date('Y-m-d');

        $balance = new Balance();
        $balance->user_id = $credit->user_id;
        $balance->type = 'Credit';
        $balance->value = $credit->value;
        $balance->date = $actualDate;
        $balance->save();
    }
}
