<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        return [
            'name' => $name,
            /* para poner los nombres de url con -: hola-soy-yo */
            'slug' => Str::slug($name),
            'color' => $this->faker->randomElement(['red','yellow','green','blue','indigo','purple','pink'])

        ];
    }
}
