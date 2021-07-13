<?php


class Italic extends RegexRule
{
    public function rule()
    {
        return '/(\*|_)(.+?)\1/';
    }

    public function replacement()
    {
        return '<i>\2</i>';
    }
}