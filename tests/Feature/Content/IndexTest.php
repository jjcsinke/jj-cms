<?php

namespace JJCS\Tests\Feature\Content;

use JJCS\CMS\Enums\ContentType;
use JJCS\CMS\Models\Content;
use JJCS\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class IndexTest extends TestCase
{

    #[Test]
    public function content_index_route_found(): void
    {
        $this->get(route('content.index'))
            ->assertStatus(200);
    }

    #[Test]
    public function content_index_response_structure(): void
    {
        Content::factory()->count(4)->create();

        $this->get(route('content.index'))
            ->assertJsonCount(4,'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'slug',
                        'type',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    #[Test]
    public function filter_content_by_type(): void
    {
        Content::factory()->count(2)->create([
            'type' => ContentType::Page,
        ]);

        Content::factory()->count(3)->create([
            'type' => ContentType::Post,
        ]);

        $this->get(route('content.index', ['type' => ContentType::Page->value]))
            ->assertJsonCount(2,'data');

        $this->get(route('content.index', ['type' => ContentType::Post->value]))
            ->assertJsonCount(3,'data');
    }
}
