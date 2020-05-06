<?php

return [
    'authors' => [
        'base_url' => env('AUTHOR_SERVICE_URL'),
        'secret' => env('AUTHOR_SERVICE_SECRET'),

    ],
    'books' => [
        'base_url' => env('BOOK_SERVICE_URL'),
        'secret' => env('BOOK_SERVICE_SECRET'),
    ],
];
