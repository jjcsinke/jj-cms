<?php

namespace JJCS\CMS\Facades;

use Illuminate\Support\Facades\Facade;

class CMSFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cms';
    }
}
