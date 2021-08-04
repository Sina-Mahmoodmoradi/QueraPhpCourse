<?php

class PublishersController
{
    public function list()
    {
        render('publishers', ['publishers' => (new Publisher())->all()]);
    }
}
