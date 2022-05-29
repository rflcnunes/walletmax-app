<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditRequest;
use App\Http\Responses\ApiResponse;
use App\Services\CreditService;

class CreditController extends Controller
{
    private $creditService;

    public function __construct(CreditService $creditService)
    {
        $this->creditService = $creditService;
    }

    public function credit(CreditRequest $request)
    {
        try {
            $value = $request -> value;

            $this->creditService->credit([
                'user_id' => auth()->user()->id,
                'value' => $request->value
            ]);

            return new ApiResponse(true, 'Your credit has been successfully made!', 'Value: ' . $value, 201);

        } catch (\Exception $exception) {
            return new ApiResponse(false, 'Sorry, it was not possible to make the credit!', $exception->getMessage(), 400);
        }
    }
}
