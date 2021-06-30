<?php
/*
$square = function ($edge) {
    return pow($edge,2);
};
//--------------------------------------
$circle = function ($radius) {
    return pow($radius,2)*pi();
};
//--------------------------------------
$triangle = function ($base,$height){
    return ($base*$height)/2;
};
//--------------------------------------
$rectangle = function ($length,$width){
    return $length*$width;
};
//--------------------------------------
*/
function getAreaFunctions($arr)
{
    foreach($arr as &$shape){
        switch($shape){
            case 'square'    :$shape = function ($edge) {
                return pow($edge,2);
            };break;
            case 'circle'    :$shape = function ($radius) {
                return pow($radius,2)*pi();
            }; break;
            case 'triangle'  :$shape = function ($base,$height){
                return ($base*$height)/2;
            }; break;
            case 'rectangle' :$shape = function ($length,$width){
                return $length*$width;
            }; break;
        }
    }
    return $arr;
}

$functions = getAreaFunctions(['square', 'circle', 'rectangle', 'triangle']);

echo $functions[0](1) . "<br>";
echo $functions[1](2) . "<br>";
echo $functions[2](2, 4) . "<br>";
echo $functions[3](4, 5);