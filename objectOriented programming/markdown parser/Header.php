<?php


class Header extends RegexRule
{
    public function rule()
    {
        return '/(#+\s*)(.+)/';
    }
    public function replacement()
    {
        return '<h3>\2</h3>';
    }
}