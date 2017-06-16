<?php

namespace Tests\Feature;

use App\Dealcloser\Core\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_super_admin_can_update_corporation_profile()
    {
        $user = create(User::class)->assignRole('super-admin');

        $this->signIn($user);

        $settings = [
            'name'          => 'Company',
            'email'         => 'info@company.com',
            'phone'         => '0623844932',
            'website'       => 'domain.com',
            'description'   => 'A short description',
        ];

        $this->patch('/instellingen/profiel', $settings)
            ->assertSessionHas('status', 'Bedrijfsprofiel geupdatet!');

        $this->assertDatabaseHas('settings', $settings);
    }

    /** @test */
    public function a_admin_cannot_update_corporation_profile()
    {
        $user = create(User::class)->assignRole('admin');

        $this->signIn($user);

        $settings = [
            'name'          => 'Company',
            'email'         => 'info@company.com',
            'phone'         => '0623844932',
            'website'       => 'domain.com',
            'description'   => 'A short description',
        ];

        $this->patch('/instellingen/profiel', $settings)
            ->assertSessionHas('status', 'Niet geautoriseerd!')
            ->assertRedirect('/');

        $this->assertDatabaseMissing('settings', $settings);
    }

    /** @test */
    public function a_super_admin_can_update_corporation_administration()
    {
        $user = create(User::class)->assignRole('super-admin');

        $this->signIn($user);

        $settings = [
            'kvk'           => '8a9sdfasdf9jnkasa',
            'btw'           => 'asdf0asf9uasodfas',
        ];

        $this->patch('/instellingen/administratie', $settings)
            ->assertSessionHas('status', 'Bedrijfsadministratie geupdatet!');

        $this->assertDatabaseHas('settings', $settings);
    }

    /** @test */
    public function a_admin_cannot_update_corporation_administration()
    {
        $user = create(User::class)->assignRole('admin');

        $this->signIn($user);

        $settings = [
            'kvk'           => '8a9sdfasdf9jnkasa',
            'btw'           => 'asdf0asf9uasodfas',
        ];

        $this->patch('/instellingen/administratie', $settings)
            ->assertSessionHas('status', 'Niet geautoriseerd!')
            ->assertRedirect('/');

        $this->assertDatabaseMissing('settings', $settings);
    }

    /** @test */
    public function a_super_admin_can_update_corporation_location()
    {
        $user = create(User::class)->assignRole('super-admin');

        $this->signIn($user);

        $settings = [
            'address'   => 'Boschlaan 10',
            'zip'       => '5993HK',
            'city'      => 'Maasbree',
        ];

        $this->patch('/instellingen/locatie', $settings)
            ->assertSessionHas('status', 'Bedrijfslocatie geupdatet!');

        $this->assertDatabaseHas('settings', $settings);
    }

    /** @test */
    public function a_admin_cannot_update_corporation_location()
    {
        $user = create(User::class)->assignRole('admin');

        $this->signIn($user);

        $settings = [
            'address'   => 'Boschlaan 10',
            'zip'       => '5993HK',
            'city'      => 'Maasbree',
        ];

        $this->patch('/instellingen/locatie', $settings)
            ->assertSessionHas('status', 'Niet geautoriseerd!')
            ->assertRedirect('/');

        $this->assertDatabaseMissing('settings', $settings);
    }
}
