<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Volt\Actions\LoginUser;

class Login
{
    /**
     * Attempt to authenticate a new session.
     */
    public function __invoke(array $credentials, bool $remember)
    {
        if (!Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        session()->regenerate();

        return redirect()->to(match (Auth::user()->role) {
            'admin' => '/admin/dashboard',
            'petugas' => '/petugas/dashboard',
            'verifikator' => '/verifikator/dashboard',
            default => '/dashboard',
        });
    }
}
