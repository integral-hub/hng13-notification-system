<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmailController;
// Test commit from STAN — setting up email-service branch

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| All routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group.
|
*/

// Public routes
Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class)->name('login'); // /api/auth/login
});

Route::post('/users', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'all']);
        Route::get('{user}', [UserController::class, 'show']);
    });

    // Current authenticated user info
    Route::get('/me', function (\Illuminate\Http\Request $request) {
        return response()->json([
            'success' => true,
            'user' => $request->user()
        ]);
    });

    // EMAILSERVICE TEST //

    Route::post('/send-email', [EmailController::class, 'sendEmail']);
});
