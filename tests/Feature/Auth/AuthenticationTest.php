<?php

use App\Models\User;
use Livewire\Volt\Volt as LivewireVolt;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

// General test to check if login screen loads
test('login screen can be rendered', function () {
    $response = $this
    ->get('/login');
    $response->assertStatus(200);
});

// Test for admin role
test('admin user is redirected to admin dashboard', function () {
    $user = User::factory()->create(['role' => 'admin']);

    LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertHasNoErrors()
        ->assertRedirect(url('/admin/dashboard'));

    $this->assertAuthenticated();
});

// Test for petugas role
test('petugas user is redirected to petugas dashboard', function () {
    $user = User::factory()->create(['role' => 'petugas']);

    LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertHasNoErrors()
        ->assertRedirect(url('/petugas/dashboard'));

    $this->assertAuthenticated();
});

// Test for verifikator role
test('verifikator user is redirected to verifikator dashboard', function () {
    $user = User::factory()->create(['role' => 'verifikator']);

    LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertHasNoErrors()
        ->assertRedirect(url('/verifikator/dashboard'));

    $this->assertAuthenticated();
});

// Test for invalid login
test('users cannot authenticate with invalid password', function () {
    $user = User::factory()->create(['role' => 'admin']);

    LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('login')
        ->assertHasErrors('email');

    $this->assertGuest();
});

// Test logout
test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this
    ->actingAs($user)
    ->post('/logout');
    $response
    ->assertRedirect(url('/'));
    $this->assertGuest();
});
