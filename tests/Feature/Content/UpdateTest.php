<?php

namespace JJCS\Tests\Feature\Content;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use JJCS\CMS\Enums\ContentType;
use JJCS\CMS\Models\Content;
use JJCS\Tests\Models\User;
use JJCS\Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\Attributes\Test;

class UpdateTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->actAsUser(['cms.update']);
    }

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
