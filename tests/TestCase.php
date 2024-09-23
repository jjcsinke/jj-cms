<?php
namespace JJCS\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use JJCS\CMS\Providers\CmsServiceProvider;
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

}
