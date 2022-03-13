<?php
 
namespace App\Exceptions;
 
use Exception;
 
class DuplicatedPostException extends Exception
{
    protected $message = 'Já existe um post com este título';
    protected $statusCode = 409;

    public function render($request)
    {       
        return Handler::makeJSONResponse($this->getMessage(), $this->statusCode);
    }
}