<?php

namespace App\Services;

use App\Repositories\Contracts\CreditRepositoryInterface;

class CreditService
{
    private $creditService;

    public function __construct(CreditRepositoryInterface $creditRepository)
    {
        $this->creditService = $creditRepository;
    }

    /**
     * @return CreditRepositoryInterface
     */
    public function getCreditRepository(): CreditRepositoryInterface
    {
        return $this->creditService;
    }

    public function credit(array $data)
    {
        $this->getCreditRepository()->getModel()->create($data);
    }
}
