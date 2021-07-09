<?php

class ExceptionProxy extends Exception
{
    public $function;
    public $message;
}

function transformExceptions($functions)
{
    foreach($functions as &$function){
        $check=true;
        try{
            $function();
        }catch(Exception $e){
            $check=false;
            $f=$function;
            $function=new Exceptionproxy;
            $function->function=$f;
            $function->message=$e->getMessage();
        }catch(Exceptionproxy $e){
            $check=false;
            $f=$function;
            $function=new Exceptionproxy;
            $function->function=$f;
            $function->message=$e->getMessage();
        }
        if($check){
            $f=$function;
            $function=new Exceptionproxy;
            $function->function=$f;
            $function->message='ok!';
        }
    }
    return $functions;
}

function f()
{
    Throw new Exception("Error message!");
}

function g()
{
    return;
}

$transformed_exceptions = transformExceptions(["f", "g"]);

foreach ($transformed_exceptions as $transformed_exception) {
    echo "Function name: "
        . $transformed_exception->function
        . "<br>Message: "
        . $transformed_exception->message
        . "<br>";
}
