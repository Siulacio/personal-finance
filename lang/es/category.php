<?php

return [
    'entity' => 'Categoría',
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
    'filters' => [
        'type' => 'Filtrar por tipo',
    ],
    'stats' => [
        'total' => 'Total de categorias disponibles',
    ],
];
