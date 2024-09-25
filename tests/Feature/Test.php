<?php

namespace JJCS\Tests\Feature;

use JJCS\CMS\Providers\CmsServiceProvider;
use JJCS\Tests\TestCase;

class Test extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [CmsServiceProvider::class];
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get(route('articles.index'));

        $response->assertStatus(200);
    }
}
