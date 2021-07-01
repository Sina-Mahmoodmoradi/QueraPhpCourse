<?php

function stripTags($str, $arr){
    foreach($arr as $tag){
        $pattern="/(<|(<\/))$tag>/";
        $str=preg_replace($pattern,'',$str);
    }
    return $str;
}


$html = '<body><p>Sample paragraph</p><b>bold text</b></body>';
echo stripTags($html, ['body', 'p']); // Sample paragraph<b>bold text</b>