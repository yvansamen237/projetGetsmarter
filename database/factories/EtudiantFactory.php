<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    protected $model = Etudiant::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ville = $this->faker->city;
        $pays = $this->faker->country;

        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'sexe' => array_rand(['H', 'F'], 1),
            'dateNaissance' => $this->faker->dateTimeBetween('1980-01-01', '2022-01-01'),
            'lieuNaissance' => "$pays, $ville",
            'nationaLite' => $this->faker->country,
            'pays' => $pays,
            'ville' => $ville,
            'adresse' => $this->faker->address,
            'telephone1' => $this->faker->unique()->phoneNumber,
            'telephone2' => $this->faker->unique()->phoneNumber,
            'pieceIdentite' => array_rand(['CNI', 'PASSPORT', 'PERMIS DE CONDUIRE'], 1),
            'noPieceIdentite' => $this->faker->unique()->creditCardNumber,
        ];
    }
}