<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Auth\PasswordResetInterface;

class ForgotPasswordController extends Controller
{
    public function __construct(
        private readonly PasswordResetInterface $passwordResetService
    ) {}


}
