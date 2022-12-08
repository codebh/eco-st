<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->name,
            'content'=>$this->faker->paragraphs,
            'store_id'=>$this->faker->numberBetween(1,9),
            'category_id'=>$this->faker->numberBetween(1,9),
            'main_image'=>$this->faker->imageUrl(),
            'price'=>$this->faker->numberBetween(20,300),
            'price_offer'=>$this->faker->numberBetween(20,300),
            'size_chart'=>$this->faker->imageUrl(),
            'status'=> $this->faker->randomElement(['active','not active']),
            'show'=>$this->faker->randomElement(['active','not active']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
