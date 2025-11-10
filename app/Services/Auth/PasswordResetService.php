<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Interfaces\Auth\PasswordResetInterface;

class PasswordResetService implements PasswordResetInterface
{
     private string $table = 'password_reset_tokens';

}
