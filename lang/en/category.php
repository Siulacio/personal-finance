<?php

return [
    'entity' => 'Category',
    'title' => [
        'create' => 'Create category',
        'edit' => 'Edit category',
    ],
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
];
