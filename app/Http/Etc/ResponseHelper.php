<?php

namespace App\Http\Etc;

use Symfony\Component\HttpFoundation\JsonResponse;

class ResponseHelper
{
    public static function success($data = null, $message = 'Success', $statusCode = 200)
    {
        return self::formatResponse(true, $data, $message, $statusCode);
    }

    public static function error($message = 'Error', $data = null, $statusCode = 400)
    {
        return self::formatResponse(false, $data, $message, $statusCode);
    }

    public static function generic($success, $data = null, $message = '', $statusCode = 200)
    {
        return self::formatResponse($success, $data, $message, $statusCode);
    }

    private static function formatResponse($success, $data, $message, $statusCode): JsonResponse
    {
        $response = [
            'success' => $success,
            'data' => $data,
            'message' => $message,
        ];

        return new JsonResponse($response, $statusCode);
    }
}
