<?php

namespace JJCS\CMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JJCS\CMS\Http\Requests\Content\CreateRequest;
use JJCS\CMS\Http\Requests\Content\IndexRequest;
use JJCS\CMS\Http\Requests\Content\ShowRequest;
use JJCS\CMS\Http\Requests\Content\UpdateRequest;
use JJCS\CMS\Http\Resources\ContentCollection;
use JJCS\CMS\Http\Resources\ContentResource;
use JJCS\CMS\Models\Content;

class ContentController extends Controller
{

    public function index(IndexRequest $request): ContentCollection
    {
        $content = Content::type($request->type)->paginate();

        return ContentCollection::make($content);
    }

    public function show(ShowRequest $request, Content $content): ContentResource
    {
        return ContentResource::make($content);
    }

    public function store(CreateRequest $request): ContentResource
    {
        $content = Content::create($request->validated());

        return ContentResource::make($content);
    }

    public function update(UpdateRequest $request, Content $content): ContentResource
    {
        $content->update($request->validated());

        return ContentResource::make($content);
    }
}
