<?php

namespace JJCS\Tests\Feature\Content;

use Illuminate\Support\Arr;
use JJCS\CMS\Enums\ContentType;
use JJCS\CMS\Models\Content;
use JJCS\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CreateTest extends TestCase
{

    #[Test]
    public function create_content(): void
    {
        $data = [
            'slug' => 'test-slug',
            'type' => Arr::random(ContentType::cases())->value,
        ];

        $this->post(route('content.store', $data))
            ->assertSuccessful()
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
