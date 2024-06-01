<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class XprodukFactory extends Factory
{
    public function definition(): array
    {
        return [
            'created_at' => now(),
            'updated_at' => now(),
            'IsActive' => "1",
        ];
    }
}
