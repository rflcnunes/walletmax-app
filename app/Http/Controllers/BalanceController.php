<?php

namespace App\Http\Controllers;

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

        dd($this->balanceService->totalValueByUser($id));
    }
}
