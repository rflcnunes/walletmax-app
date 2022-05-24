<?php

namespace App\Repositories\Contracts;

interface BalanceRepositoryInterface
{
    public function getModel();
    public function getDebits($id);
    public function getCredits($id);
    public function getAll($id);
//    public function getTotalValueByUser($id);
}
