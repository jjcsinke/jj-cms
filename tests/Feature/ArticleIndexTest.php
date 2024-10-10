<?php

namespace JJCS\Tests\Feature;

use JJCS\CMS\Models\Content;
use JJCS\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ArticleIndexTest extends TestCase
{

    #[Test]
    public function article_index_route_found()
    {
        $this->get(route('articles.index'))
            ->assertStatus(200);
    }

    #[Test]
    public function article_index_response_structure()
    {
        Content::factory()->count(5)->create();

        $this->get(route('articles.index'))
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'slug',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }
}
