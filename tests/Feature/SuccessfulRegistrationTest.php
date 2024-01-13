<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Volt\Volt;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuccessfulRegistrationTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response
            ->assertOk()
            ->assertSeeVolt('pages.auth.register');
    }

    public function test_customers_can_register(): void
    {
        $component = Volt::test('pages.auth.register')
            ->set('name', 'Test User')
            ->set('username', 'testuser')
            ->set('email', 'test@example.com')
            ->set('password', 'password');

        $component->call('register');

        $this->assertTrue(User::where('email', 'test@example.com')->exists());

        $component->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticated();
    }

    public function test_it_fails_to_register_with_weak_password()
    {
        $component = Volt::test('pages.auth.register')
            ->set('username', 'testuser')
            ->set('email', 'test@example.com')
            ->set('password', 'weak');

        $component->call('register');
            $component->assertHasErrors(['password' => 'min']);

        $this->assertFalse(User::where('email', 'test@example.com')->exists());
    }

    public function test_it_fails_to_register_with_existing_email()
    {
        User::factory()->create(['email' => 'existing@example.com']);

        $component = Volt::test('pages.auth.register')
            ->set('username', 'testuser')
            ->set('email', 'existing@example.com')
            ->set('password', 'password')
            ->set('passwordConfirmation', 'password');

        $component->call('register');
        $component->assertHasErrors(['email' => 'unique']);

        $this->assertCount(1, User::where('email', 'existing@example.com')->get());
    }
}
