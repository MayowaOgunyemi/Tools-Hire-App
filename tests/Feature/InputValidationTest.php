<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Volt\Volt;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InputValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_prevents_sql_injection_attempt()
    {
        $component = Volt::test('pages.auth.register')
            ->set('username', "testuser'; DROP TABLE users;")
            ->set('email', 'test@example.com')
            ->set('password', 'password');

            $component->call('register');

        $this->assertFalse(User::where('username', "testuser'; DROP TABLE users;")->exists());
    }

    public function test_it_prevents_cross_site_scripting_attempt()
    {
        $component = Volt::test('pages.auth.register')
            ->set('username', '<script>alert("XSS Attack");</script>')
            ->set('email', 'test@example.com')
            ->set('password', 'password');
            
            $component->call('register');

        $this->assertFalse(User::where('username', '<script>alert("XSS Attack");</script>')->exists());
    }
}
