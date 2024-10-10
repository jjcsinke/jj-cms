<?php

namespace JJCS\CMS\Services;

class CMSService
{
    public function test(): string
    {
        return 'Hello World';
    }

    public function menu(): array
    {
        return [
            [
                'name' => 'Home',
                'url' => '/',
            ],
            [
                'name' => 'About',
                'url' => '/about',
            ],
            [
                'name' => 'Contact',
                'url' => '/contact',
            ],
        ];
    }
}
