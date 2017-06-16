<?php

namespace Tests\Feature;

use DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_request_a_new_password()
    {
        $user = create('App\User');

        $response = $this->json('POST', '/password/reset', ['email' => $user->email]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => 'Check uw email',
            ]);

        $this->assertDatabaseHas('password_resets', [
            'email' => $user->email,
        ]);
    }

    /** @test */
    public function a_user_that_does_not_exists_can_not_request_a_new_password()
    {
        $response = $this->json('POST', '/password/reset', ['email' => 'test@corporation.com']);

        $response
            ->assertStatus(422)
            ->assertJson([
                'error' => 'We kunnen geen gebruiker vinden met dit e-mail adres.',
            ]);
    }

//    /** @test */
//    public function a_user_can_reset_his_password()
//    {
//        $user = create('App\User');
//
//        $this->json('POST', '/password/reset', ['email' => $user->email]);
//
//        $reset = DB::table('password_resets')
//            ->where('email', $user->email)
//            ->first();
//
//        $this->post('/password/reset/' . $reset->token, [
//            'email'                 => $user->email,
//            'password'              => 'new_password',
//            'password_confirmation' => 'new_password',
//            'token'                 => $reset->token
//        ])->assertStatus(200);
//
//        //$this->assertDatabaseMissing('password_resets', ['email' => $user->email ]);
//    }
}
