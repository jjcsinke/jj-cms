<?php

namespace Database\Factories\JJCS\CMS\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use JJCS\CMS\Enums\ContentType;
use JJCS\CMS\Models\Content;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ContentFactory extends Factory
{

    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'type' => $this->faker->randomElement(ContentType::cases())
        ];
    }

}
