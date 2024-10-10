<?php

namespace JJCS\Tests\Feature\Content;

use Illuminate\Support\Arr;
use JJCS\CMS\Enums\ContentType;
use JJCS\CMS\Models\Content;
use JJCS\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UpdateTest extends TestCase
{

    #[Test]
    public function update_content(): void
    {
        $content = Content::factory()->create();

        $data = [
            'type' => Arr::random(ContentType::cases())->value,
            'slug' => 'test-slug',
        ];

        $this->put(route('content.update', $content), $data)
            ->assertSuccessful()
            ->assertJsonFragment($data);
    }

}
