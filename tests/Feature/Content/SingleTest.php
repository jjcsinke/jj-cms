<?php

namespace JJCS\Tests\Feature\Content;

use JJCS\CMS\Enums\ContentType;
use JJCS\CMS\Models\Content;
use JJCS\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SingleTest extends TestCase
{

    #[Test]
    public function content_index_route_found(): void
    {
        $content = Content::factory()->create();
        $this->get(route('content.show', $content))
            ->assertStatus(200);
    }

    #[Test]
    public function content_response_structure(): void
    {
        $content = Content::factory()->create();

        $this->get(route('content.show', $content))
            ->dump()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'slug',
                    'type',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

}
