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
    'messages' => [
        'created' => [
            'title' => 'Categoría creada',
            'body' => 'La categoría ha sido creada exitosamente.',
        ],
        'updated' => [
            'title' => 'Categoría actualizada',
            'body' => 'La categoría ha sido actualizada exitosamente.',
        ],
        'deleted' => [
            'title' => 'Categoría eliminada',
            'body' => 'La categoría ha sido eliminada exitosamente.',
        ],
    ],
];
