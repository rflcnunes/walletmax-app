<?php

namespace App\Services;

use App\Repositories\Contracts\DebitRepositoryInterface;
use Illuminate\Support\Facades\Log;

class DebitService
{
    private $debitRepository;

    public function __construct(DebitRepositoryInterface $debitRepository)
    {
        $this->debitRepository = $debitRepository;
    }

    public function getDebitRepository(): DebitRepositoryInterface
    {
        return $this->debitRepository;
    }

    public function debit(array $data)
    {

        $this->getDebitRepository()->getModel()->create($data);
        Log::debug('Debit service');
    }
}
