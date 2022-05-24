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
    public function getCreditRepository(): BalanceRepositoryInterface
    {
        return $this->balanceService;
    }

    public function totalValueByUser($id)
    {
        $debits = $this->getCreditRepository()->getDebits($id);
        $credits = $this->getCreditRepository()->getCredits($id);
        return $debits - $credits;
//        return $this->getCreditRepository()->getTotalValueByUser($id);
    }
}
