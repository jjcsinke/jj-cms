<?php

namespace JJCS\CMS\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return parent::toArray($request);
    }
}
