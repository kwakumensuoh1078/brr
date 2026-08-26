<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UsrUser;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    public function test_user_can_register_successfully()
    {
        $uniqueUsername = uniqid('reg_user_');
        $response = $this->post(route('register.submit'), [
            'user_fullname' => 'Test Citizen User',
            'username' => $uniqueUsername,
            'phone_number' => '0244' . rand(100000, 999999),
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
        UsrUser::where('username', $uniqueUsername)->delete();
    }

    public function test_successful_login_redirects_to_acc_dashboard()
    {
        $uniqueUsername = uniqid('login_user_');
        $user = UsrUser::create([
            'user_fullname' => 'Test User',
            'username' => $uniqueUsername,
            'phone_number' => '0244' . rand(100000, 999999),
            'password' => Hash::make('Secret123!'),
            'user_date' => date('Y-m-d H:i:s'),
            'user_cat' => 2,
            'sid' => 0,
            'status' => 1,
            'created_by' => 0,
            'userType' => 'Citizen',
        ]);

        $response = $this->post(route('login.submit'), [
            'username' => $uniqueUsername,
            'password' => 'Secret123!',
        ]);

        $response->assertRedirect('/acc/inc/dashboard.php');
        $user->delete();
    }
}

