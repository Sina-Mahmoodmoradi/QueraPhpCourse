<?php

require 'ListFormatter.php';

class JsonListFormatter extends ListFormatter
{
    public function format():string
    {
        return json_encode($this->getData());
    }
}

$sample_data = ['item1', 'item2', 'item3'];
$json_list_formatter = new JsonListFormatter($sample_data);
echo $json_list_formatter->format(); // ["item1","item2","item3"]
