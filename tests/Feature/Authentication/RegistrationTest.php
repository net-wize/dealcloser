<?php

namespace Tests\Feature;

use App\Dealcloser\Core\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_register()
    {
        User::unguard();

        $user = make(User::class, [
            'password'              => 'passwordtest',
            'password_confirmation' => 'passwordtest',
        ])->toArray();

        create(User::class)->assignRole('admin');

        $response = $this->post('/registreer', $user);

        $response
            ->assertRedirect('/')
            ->assertSessionHas('status', 'Zodra uw account is goedgekeurd ontvangt u een email');

        //Remove password and password_confirmation from array
        array_splice($user, 4, 2);

        $this->assertDatabaseHas('users', $user);
    }
}
