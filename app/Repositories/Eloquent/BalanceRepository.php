<?php

namespace App\Repositories\Eloquent;

use App\Models\Balance;
use App\Repositories\Contracts\BalanceRepositoryInterface;

class BalanceRepository implements BalanceRepositoryInterface
{
    public function __construct()
    {
        $this->model = app(Balance::class);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getDebits($id)
    {
        return $this->model
            ->find($id)
            ->where('user_id', '=', $id)
            ->where('type', '=', 'Debit')
            ->sum('value');
    }

    public function getCredits($id)
    {
        return $this->model
            ->find($id)
            ->where('user_id', '=', $id)
            ->where('type', '=', 'Credit')
            ->sum('value');
    }
}
