<?php


require 'ListFormatter.php';

class HtmlListFormatter extends ListFormatter
{
    public function format(): string
    {
        $html='<ul>';
        foreach ($this->getData() as $item){
            $html.='<li>'.$item.'</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}

$sample_data = ['item1', 'item2', 'item3'];
$html_list_formatter = new HtmlListFormatter($sample_data);
echo $html_list_formatter->format(); // <ul><li>item1</li><li>item2</li><li>item3</li></ul>