<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebitRequest;
use App\Http\Responses\ApiResponse;
use App\Services\DebitService;
use Illuminate\Http\Request;

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
            $value = $request->value;

            $this->debitService->debit([
                'user_id' => auth()->user()->id,
                'value' => $request->value,
            ]);

            return new ApiResponse(true, 'Your debit of US$' . $value . ' has been successfully made!');

        } catch (\Exception $exception) {
            return new ApiResponse(false, 'Sorry, it was not possible to make the debit!', $exception->getMessage(), 400);
        }
    }
}
