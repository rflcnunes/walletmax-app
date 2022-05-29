<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebitRequest;
use App\Http\Responses\ApiResponse;
use App\Services\DebitService;

class DebitController extends Controller
{
    private $debitService;

    public function __construct(DebitService $debitService)
    {
        $this->debitService = $debitService;
    }

    public function debit(DebitRequest $request)
    {
        try {
            $value = $request->input('value');

            $debit = $this->debitService->debit([
                'user_id' => auth()->user()->id,
                'value' => $request->value,
            ]);

            if (!$debit === true) {

                return ($value === 0) ? new ApiResponse(false, 'Debit value must be greater than 0',null, 406) : new ApiResponse(false, 'You do not have enough balance', false, 406);

            }

            return new ApiResponse(true, 'Your debit was successful', 'Value: ' . $value, 201);

        } catch (\Exception $exception) {
            return new ApiResponse(false, 'Sorry, it was not possible to make the debit!', $exception->getMessage(), 400);
        }
    }
}
