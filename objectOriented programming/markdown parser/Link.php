<?php



class Link extends RegexRule
{
    public function rule()
    {
        return '/(^|[^!])\[(.+)\]\((.+)\)/';
    }
    public function replacement()
    {
        return '\1<a href="\3">\2</a>';
    }
}