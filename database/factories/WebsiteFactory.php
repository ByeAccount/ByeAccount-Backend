<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Website>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'logo_url' => "https://picsum.photos/200/200",
            'website_url' => $this->faker->url,
            'deletion_url' => $this->faker->url,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Website $website) {
            $website->steps()->createMany([
                ['order' => 1, 'text' => fake()->sentence],
                ['order' => 2, 'text' => fake()->sentence],
                ['order' => 3, 'text' => fake()->sentence],
            ]);
        });
    }
}
