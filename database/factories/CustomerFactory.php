<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'document_type' => \Arr::random(['cpf', 'cnpj']),
            'name' => fn ($attrs) => ($attrs['document_type'] ?? null) == 'cpf'
                ? \fake('pt_BR')->name() : \fake('pt_BR')->company(),
            'document' => fn ($attrs) => ($attrs['document_type'] ?? null) == 'cpf'
                ? \fake()->numerify('###.###.###-##') :
                \fake()->numerify('##.###.###/000#-##'),
        ];
    }
}
