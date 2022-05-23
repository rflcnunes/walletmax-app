<?php

namespace App\Repositories\Contracts;

interface DebitRepositoryInterface
{
    public function getAll();
    public function getAmount($id);
    public function getModel();
}
