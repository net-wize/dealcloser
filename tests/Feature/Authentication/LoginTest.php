<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_authenticates_successful()
    {
        //        $user = make(User::class);
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
    }
}
