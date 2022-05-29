<?php

namespace App\Services;

use App\Http\Responses\ApiResponse;
use App\Repositories\Contracts\DebitRepositoryInterface;
use Illuminate\Support\Facades\Log;

class DebitService
{
    private $debitRepository;
    private $balanceService;

    public function __construct(DebitRepositoryInterface $debitRepository, BalanceService $balanceService)
    {
        $this->debitRepository = $debitRepository;
        $this->balanceService = $balanceService;
    }

    public function getDebitRepository(): DebitRepositoryInterface
    {
        return $this->debitRepository;
    }

    public function debit(array $data)
    {
        $user_id = auth()->user()->id;
        $balance = $this->balanceService->totalValueByUser($user_id);

        if ($balance < $data['value'] || $data['value'] <= 0) {
            return false;
        }

        $this->getDebitRepository()->getModel()->create($data);
        return true;
    }
}
