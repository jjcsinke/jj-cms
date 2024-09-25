<?php

namespace JJCS\CMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JJCS\CMS\Http\Resources\ArticleCollection;
use JJCS\CMS\Http\Resources\ArticleResource;
use JJCS\CMS\Models\Article;

class ArticleController extends Controller
{

    public function index(Request $request): ArticleCollection
    {
        return ArticleCollection::make(Article::paginate());
    }

    public function show(Request $request, Article $article): ArticleResource
    {
        return ArticleResource::make($article);
    }
}
