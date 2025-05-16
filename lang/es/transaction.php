<?php

return [
    'entity' => 'Movimiento',
    'fields' => [
        'date' => 'Fecha',
        'amount' => 'Monto',
        'description' => 'Descripción',
        'category' => 'Categoría',
        'type' => 'Tipo',
        'image' => 'Imagen',
        'user' => 'Usuario',
    ],
    'messages' => [
        'created' => [
            'title' => 'Movimiento creado',
            'body' => 'El movimiento ha sido creado exitosamente.',
        ],
        'updated' => [
            'title' => 'Movimiento actualizado',
            'body' => 'El movimiento ha sido actualizado exitosamente.',
        ],
        'deleted' => [
            'title' => 'Movimiento eliminado',
            'body' => 'El movimiento ha sido eliminado exitosamente.',
        ],
    ],
    'stats' => [
        'income_total' => 'Total de ingresos',
    ],
];
