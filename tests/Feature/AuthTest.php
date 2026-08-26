<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UsrUser;

class AuthTest extends TestCase
{
    public function test_user_can_register_successfully()
    {
        $uniqueUsername = 'testuser_' . time();
        $response = $this->post(route('register.submit'), [
            'user_fullname' => 'Test Citizen User',
            'username' => $uniqueUsername,
            'phone_number' => '0244123456',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('usr_users', [
            'username' => $uniqueUsername,
            'user_cat' => 2,
            'sid' => 0,
            'status' => 1,
        ]);
    }

    public function test_login_validation_and_alert_display()
    {
        $response = $this->from(route('login'))->post(route('login.submit'), [
            'username' => 'nonexistent_user',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect(route('login'));
        $followUp = $this->get(route('login'));
        $followUp->assertSee('The provided credentials do not match our records.');
        $followUp->assertSee('system-alert-wrapper');
    }
}
