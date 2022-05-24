<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Services\BalanceService;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    private $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function getBalanceByUser()
    {
        $id = auth()->user()->id;

        $value = $this->balanceService->totalValueByUser($id);

        $data = $this->balanceService->getCreditRepository()->getAll();

        return new ApiResponse(true, 'Your total balance: US$' . $value, $data);
    }
}
