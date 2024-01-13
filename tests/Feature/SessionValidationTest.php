<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SessionValidationTest extends TestCase
{
    use RefreshDatabase;

    // public function test_it_logs_out_user_due_to_session_timeout()
    // {
    //     $user = User::factory()->create();
    //     Auth::login($user);

    //     sleep(config('session.lifetime') + 1);

    //     $response = $this->actingAs($user)->get('/');

    //     $response->assertRedirect('/login');
    // }

    // public function test_it_invalidates_previous_session_to_prevent_concurrent_sessions()
    // {
    //     // Simulate user login
    //     $user = User::factory()->create();
    //     Auth::login($user);

    //     // Simulate login from another device
    //     $anotherUser = User::factory()->create();
    //     Auth::login($anotherUser);

    //     // Attempt to access a protected route with the original user
    //     $response = $this->actingAs($user)->get('/');

    //     // Assert that the user is redirected to the login page due to invalidation of the previous session
    //     $response->assertRedirect('/login');
    // }
}
