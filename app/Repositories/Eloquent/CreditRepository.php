<?php

namespace App\Repositories\Eloquent;

use App\Models\Credit;
use App\Repositories\Contracts\CreditRepositoryInterface;

class CreditRepository implements CreditRepositoryInterface
{
    public function __construct()
    {
        $this->model = app(Credit::class);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getBalance($id)
    {
        return $this->model
            ->find($id)
            ->where('user_id', '=', $id)
            ->sum('value');
    }
}
