<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenu' => $this->faker->text,
            'lieu' =>  $this->faker->randomElement([null, $this->faker->city]),
            'user_id' => $this->faker->randomElement([8, 45, 29]),
            'club_id' => $this->faker->randomElement([ 3, 8, 31, 5455, 29]),
            'reponse_id' => $this->faker->randomElement([null, $this->faker->numberBetween(1, 16)]),
            'secteur_visiteur' => $this->faker->numberBetween(0, 1),
            'nb_jaime' => $this->faker->numberBetween(0, 11000),
            'nb_partage' => $this->faker->numberBetween(0, 20000),
        ];
    }
}
