<?php

namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;

class ApiResponse extends JsonResponse
{
    /**
     * ApiResponse constructor.
     * @param bool $success
     * @param string $text
     * @param mixed $data
     * @param int $status
     */
    public function __construct($success = true, $text = "", $data = [], $status = 200)
    {
        $response = [
            "success"   => $success,
            "text"      => $text,
            "data"      => $data,
            "status"    => $status
        ];

        parent::__construct($response, $status);
    }
}
