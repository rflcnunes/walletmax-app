<?php

namespace App\Repositories\Eloquent;
use App\Models\Debit;
use App\Repositories\Contracts\DebitRepositoryInterface;

class DebitRepository implements DebitRepositoryInterface
{
    public function __construct()
    {
        $this->model = app(Debit::class);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getBalance($id)
    {
        return $this->model
            ->find($id)
            ->where('user_id', '=', $id)
            ->sum('value');
    }
}
