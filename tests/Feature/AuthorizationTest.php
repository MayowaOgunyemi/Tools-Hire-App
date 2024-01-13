<?php

namespace Tests\Feature\Authorization;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{

    use RefreshDatabase;
   
    public function test_customer_cannot_access_admin_functionality(): void
    {

        $customer = User::factory()->create(['role' => 'customer']);

        $response = $this->actingAs($customer)->get('/manage/users');
        $response = $this->actingAs($customer)->get('/manage/tools');

        $response
            ->assertForbidden()
            ->assertStatus(403);
    }
}
