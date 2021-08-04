<?php

class AuthorsController
{
    public function list()
    {
        render('authors', ['authors' => (new Author())->all()]);
    }
}
