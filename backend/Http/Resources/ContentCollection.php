<?php

namespace JJCS\CMS\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContentCollection extends ResourceCollection
{
    public $collects = ContentResource::class;
}
