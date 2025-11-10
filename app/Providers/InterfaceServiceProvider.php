<?php

namespace App\Providers;

use App\Interfaces\Auth\PasswordResetInterface;
use App\Services\Auth\PasswordResetService;
use App\Interfaces\UserInterface;
use App\Services\UserService;
use App\Services\Auth\LoginService;
use App\Interfaces\Auth\LoginInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\UserController;

class InterfaceServiceProvider extends ServiceProvider
{

    /**
     * Binds interfaces to their implementations.
     * @var array<string, string>
     */
      public $bindings = [
        LoginInterface::class => LoginService::class,
        UserInterface::class => UserService::class,
        PasswordResetInterface::class => PasswordResetService::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
