<?php

namespace JJCS\CMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JJCS\CMS\ContentCollection;
use JJCS\CMS\Http\Resources\ContentResource;
use JJCS\CMS\Models\Content;

class ContentController extends Controller
{

    public function index(Request $request): ContentCollection
    {
        return ContentCollection::make(Content::paginate());
    }

    public function show(Request $request, Content $article): ContentResource
    {
        return ContentResource::make($article);
    }
}
