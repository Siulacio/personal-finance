<?php

namespace Database\Seeders;

use App\Enums\CategoryTypes;
use App\Models\{Category, User};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->usersData() as $user) {
            User::query()->create($user);
        }

        foreach ($this->categoriesData() as $category) {
            Category::query()->create($category);
        }
    }

    private function usersData(): array
    {
        return [
            [
                'name' => 'Siulacio',
                'email' => 'siulacio@hotmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'John Wick',
                'email' => 'johnwick@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Robert',
                'email' => 'robert@gmail.com',
                'password' => '12345678',
            ],
        ];
    }

    private function categoriesData(): array
    {
        return [
            ['name' => 'Alimentación', 'type' => CategoryTypes::EXPENSE->value],
            ['name' => 'Transporte', 'type' => CategoryTypes::EXPENSE->value],
            ['name' => 'Salud', 'type' => CategoryTypes::EXPENSE->value],
            ['name' => 'Entretenimiento', 'type' => CategoryTypes::EXPENSE->value],
            ['name' => 'Sueldos', 'type' => CategoryTypes::INCOME->value],
            ['name' => 'Inversiones', 'type' => CategoryTypes::INCOME->value],
            ['name' => 'Otros', 'type' => CategoryTypes::EXPENSE->value],
            ['name' => 'Ahorros', 'type' => CategoryTypes::EXPENSE->value],
            ['name' => 'Otros ingresos', 'type' => CategoryTypes::INCOME->value],
            ['name' => 'Otros gastos', 'type' => CategoryTypes::EXPENSE->value],
        ];
    }
}
