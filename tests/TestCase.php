<?php

namespace JJCS\Tests;

use Database\Seeders\CmsPermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JJCS\CMS\Providers\CmsServiceProvider;
use JJCS\Tests\Models\User;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use WithWorkbench;
    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [CmsServiceProvider::class];
    }

    public function actAsUser(array $permissions = []): User
    {
        $user = $this->createUser(permissions: $permissions);
        $this->actingAs($user);
        return $user;
    }

    public function createUser(string $name = 'test', array $permissions = []): User
    {
        $user = User::create(['name' => $name, 'email' => "$name@example.com", 'password' => 'password']);

        if (!empty($permissions)) {
            $this->seed(CmsPermissionSeeder::class);
            $user->givePermissionTo($permissions);
        }

        return $user;
    }
}
