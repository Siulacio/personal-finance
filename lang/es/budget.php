<?php

return [
    'entity' => 'Presupuesto',
    'fields' => [
        'allocated_amount' => 'Monto asignado',
        'spent_amount' => 'Monto gastado',
        'month' => 'Mes',
        'year' => 'Año',
        'user' => 'Usuario',
        'category' => 'Categoría',
    ],
    'messages' => [
        'created' => [
            'title' => 'Presupuesto creado',
            'body' => 'El presupuesto ha sido creado exitosamente.',
        ],
        'updated' => [
            'title' => 'Presupuesto actualizado',
            'body' => 'El presupuesto ha sido actualizado exitosamente.',
        ],
        'deleted' => [
            'title' => 'Presupuesto eliminado',
            'body' => 'El presupuesto ha sido eliminado exitosamente.',
        ],
    ],
];
