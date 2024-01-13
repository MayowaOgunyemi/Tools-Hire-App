<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Volt\Volt;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_fails_to_register_guest_with_incomplete_information()
    {
        $component = Volt::test('pages.auth.register')
            ->set('username', 'testuser')
            ->set('email', 'test@example.com');

        $component->call('register');
            $component->assertHasErrors(['password' => 'required']);
        
    }

    public function test_it_fails_to_register_user_with_existing_email()
    {
        // Create a user with a specific email
        $existingUser = User::factory()->create([
            'email' => 'existing@example.com',
        ]);

        $component = Volt::test('pages.auth.register')
            ->set('username', 'testuser')
            ->set('email', 'existing@example.com')
            ->set('password', 'password');

        $component->call('register');

        $component->assertHasErrors(['email' => 'unique']);
    }
}
