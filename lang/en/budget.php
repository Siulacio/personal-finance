<?php

return [
    'entity' => 'Budget',
    'fields' => [
        'allocated_amount' => 'Allocated amount',
        'spent_amount' => 'Spent amount',
        'month' => 'Month',
        'year' => 'Year',
        'user' => 'User',
        'category' => 'Category',
    ],
    'messages' => [
        'created' => [
            'title' => 'Budget created',
            'body' => 'The budget has been created successfully.',
        ],
        'updated' => [
            'title' => 'Budget updated',
            'body' => 'The budget has been updated successfully.',
        ],
        'deleted' => [
            'title' => 'Budget deleted',
            'body' => 'The budget has been deleted successfully.',
        ],
    ],
];
