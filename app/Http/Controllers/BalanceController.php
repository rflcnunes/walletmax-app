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

        return new ApiResponse(true, 'Your total balance: US$' . $value);
    }

    public function historic()
    {
        $id = auth()->user()->id;

        $historics = $this->balanceService->getBalanceRepository()->getAll($id);

        return new ApiResponse(true, 'Historic', $historics);
    }

    public function getTotalBalance()
    {
        $id = auth()->user()->id;
        $user_name = auth()->user()->name;
        $data = [
            'username' => $user_name,
            'value' => $this->balanceService->totalValueByUser($id)
        ];


//        return  . $user_name;
        return response()->json([
            'data' => $data
        ]);
    }
}
