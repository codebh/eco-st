<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'f_name' => $this->faker->firstName,
            'l_name' => $this->faker->lastName,
            'name' => $this->faker->name,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('33626604'),
            'percentage' => '0.10',
            'i_account' => '@tafseelplatform',
            'address' => $this->faker->address,
            'cr' => $this->faker->bankAccountNumber,
            'cpr' => $this->faker->numberBetween(900000000, 999999999),
            'logo' => $this->faker->imageUrl(211,211 ,'fashion'),
            'iban' => $this->faker->bankAccountNumber,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
