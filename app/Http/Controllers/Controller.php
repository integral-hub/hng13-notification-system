<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Handle exceptions and return a simple JSON error response.
     *
     * @param \Throwable $e
     * @return JsonResponse
     */
    protected function errorResponse(\Throwable $e): JsonResponse
    {
        report($e);

        $status = 500;
        $message = __('errors.server');

        if ($e instanceof AuthenticationException) {
            $status = 401;
            $message = $e->getMessage() ?: __('auth.failed');
        }

        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
