<?php

namespace App\Services;

use App\Repositories\Contracts\BalanceRepositoryInterface;

class BalanceService
{
    private $balanceService;

    public function __construct(BalanceRepositoryInterface $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    /**
     * @return BalanceRepositoryInterface
     */
    public function getBalanceRepository(): BalanceRepositoryInterface
    {
        return $this->balanceService;
    }

    public function totalValueByUser($id)
    {
        $debits = $this->getBalanceRepository()->getDebits($id);
        $credits = $this->getBalanceRepository()->getCredits($id);
        return $credits - $debits;
//        return $this->getCreditRepository()->getTotalValueByUser($id);
    }
}
