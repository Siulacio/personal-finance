<?php

return [
    'title' => [
        'create' => 'Crear categoría',
        'edit' => 'Editar categoría',
    ],
    'fields' => [
        'name' => 'Nombre',
        'type' => 'Tipo',
    ],
    'types' => [
        App\Enums\CategoryTypes::INCOME->value => 'Ingreso',
        App\Enums\CategoryTypes::EXPENSE->value => 'Gasto',
    ],
];
