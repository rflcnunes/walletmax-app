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

        $data = $this->balanceService->getCreditRepository()->getAll($id);


        return new ApiResponse(true, 'Your total balance: US$' . $value, $data);
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
