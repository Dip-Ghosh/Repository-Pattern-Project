<?php

namespace Database\Factories\Campaign;

use App\Models\Campaign\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'mobile' => $this->faker->phoneNumber(),
            'pick_up_point' =>  $this->faker->streetName(),
            'drop_off_point' =>  $this->faker->streetName(),
            'institute' =>  $this->faker->company(),
            'scope' =>  $this->faker->realText(rand(10,20)),
            'remarks' =>  $this->faker->realText(rand(10,20)),
            'date' =>  $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
