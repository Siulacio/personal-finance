<?php

return [
    'entity' => 'Transaction',
    'fields' => [
        'date' => 'Date',
        'amount' => 'Amount',
        'description' => 'Description',
        'category' => 'Category',
        'type' => 'Type',
        'image' => 'Image',
        'user' => 'User',
    ],
    'messages' => [
        'created' => [
            'title' => 'Transaction created',
            'body' => 'The transaction has been created successfully.',
        ],
        'updated' => [
            'title' => 'Transaction updated',
            'body' => 'The transaction has been updated successfully.',
        ],
        'deleted' => [
            'title' => 'Transaction deleted',
            'body' => 'The transaction has been deleted successfully.',
        ],
    ],
];
