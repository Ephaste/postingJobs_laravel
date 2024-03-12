<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
 'title'=> $this->faker->sentence(),
 'tags'=> 'laravel, api, backend',
 'company'=>$this->faker->companyEmail(),
 'email'=>$this->faker->companyEmail(),
 'website'=>$this->faker->url(),
 'location'=>$this->faker->city(),
 'description'=>$this->faker->text(200)
        ];
    }
}
