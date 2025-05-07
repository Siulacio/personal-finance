<?php

return [
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
];
