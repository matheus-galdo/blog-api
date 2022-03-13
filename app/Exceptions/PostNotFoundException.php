<?php
 
namespace App\Exceptions;
 
use Exception;
 
class PostNotFoundException extends Exception
{
    protected $message = 'Post não encontrado';
    protected $statusCode = 404;

    public function render($request)
    {       
        return Handler::makeJSONResponse($this->getMessage(), $this->statusCode);
    }
}