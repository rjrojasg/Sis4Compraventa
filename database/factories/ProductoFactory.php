<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->ean13(), //codigo unico
            'nombre' => $this->faker->word(), //Nombre Aleatorio
            'descripcion' => $this->faker->sentence(), //Descripcion Aleatorio
            'stock' => $this->faker->numberBetween(10, 100), //Stock entre 10 y 100
            'stock_minimo' => $this->faker->numberBetween(5, 10), //Stock entre 5 y 10
            'stock_maximo' => $this->faker->numberBetween(50, 200), //Stock entre 50 y 200
            'precio_compra' => $this->faker->randomFloat(2, 10, 500), // precio entre 10 y500
            'precio_venta' => $this->faker->randomFloat(2, 20, 600), // precio entre 20 y 600
            'fecha_ingreso' => $this->faker->date(), // fecha aleatoria
            'categoria_id' => 3,
            'empresa_id' => 3,
        ];
    }
}
