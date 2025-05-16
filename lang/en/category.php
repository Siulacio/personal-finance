<?php

return [
    'entity' => 'Category',
    'fields' => [
        'name' => 'Name',
        'type' => 'Type',
    ],
    'types' => [
        App\Enums\CategoryTypes::INCOME->value => 'Income',
        App\Enums\CategoryTypes::EXPENSE->value => 'Expense',
    ],
    'messages' => [
        'created' => [
            'title' => 'Category created',
            'body' => 'The category has been created successfully.',
        ],
        'updated' => [
            'title' => 'Category updated',
            'body' => 'The category has been updated successfully.',
        ],
        'deleted' => [
            'title' => 'Category deleted',
            'body' => 'The category has been deleted successfully.',
        ],
    ],
    'filters' => [
        'type' => 'Filter by type',
    ],
    'stats' => [
        'total' => 'Total available categories',
    ],
];
