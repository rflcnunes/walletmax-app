<?php

namespace App\Repositories\Contracts;

interface DebitRepositoryInterface
{
    public function getAll();
    public function getBalance($id);
    public function getModel();
}
