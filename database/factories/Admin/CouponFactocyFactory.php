<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactocyFactory extends Factory
{
    protected $model = Coupon::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'code' => $this->faker->name(),
            'type' => $this->faker->name(),
            'value' => $this->faker->name(),
            'percent_off' => $this->faker->name(),
            'qty' => $this->faker->unique()->safeEmail(),
            'end' => now(),

        ];
    }
}
