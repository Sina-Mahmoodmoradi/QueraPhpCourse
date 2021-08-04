<?php

$routes = [
    ['GET', '', 'DashboardController@dashboard'],
    ['GET', '/books', 'BooksController@list'],
    ['GET', '/books/add', 'BooksController@addForm'],
    ['POST', '/books/add', 'BooksController@add'],
    ['GET', '/books/reserve/[i:id]', 'BooksController@reserve'],
    ['GET', '/books/unreserve/[i:id]', 'BooksController@unreserve'],
    ['GET', '/books/delete/[i:id]', 'BooksController@delete'],
    ['GET', '/authors', 'AuthorsController@list'],
    ['GET', '/publishers', 'PublishersController@list']
];
