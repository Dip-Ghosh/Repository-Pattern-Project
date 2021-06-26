<?php

namespace Database\Factories\Assignment;

use App\Models\Assignment\Assignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dateline'=> $this->faker->dayOfWeek($max = 'now'),
            'acquistion_officer'=>$this->faker->name(),
            'instruction'=>$this->faker->text()

        ];
    }
}
