<?php

class DashboardController
{
    public function dashboard()
    {
        render(
            'index',
            [
                'books_count' => (new Book)->count(),
                'authors_count' => (new Author)->count(),
                'publishers_count' => (new Publisher)->count(),
            ]
        );
    }
}
