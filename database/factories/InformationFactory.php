<?php

namespace Database\Factories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $contact_via = $this->faker->randomElement(['phone', 'email']);
        $nationality = $this->faker->randomElement(['Nepal', 'USA']);

        return [
            'name'                  => $this->faker->name($gender),
            'gender'                => $gender,
            'phone'                 => $this->faker->numerify('##########'),
            'email'                 => $this->faker->safeEmail,
            'address'               => $this->faker->address,
            'nationality'           => $nationality,
            'dob'                   => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'education_background'  => $this->faker->paragraph($nbSentences = 15),
            'contact_via'           => $contact_via
        ];
    }
}
