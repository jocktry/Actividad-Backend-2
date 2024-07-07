<?php
namespace App\libs;

class ResultResponse
{
    const SUCCESS_CODE = 200;
    const ERROR_CODE = 500;
    const NOT_FOUND_CODE = 404;
    const MESSAGE_SUCCESS = 'Success';
    const MESSAGE_ERROR = 'Error';  
    const MESSAGE_NOT_FOUND = 'Not Found';

    public $statusCode;
    public $message;
    public $data;

    function __construct(){
        $this->statusCode = self::ERROR_CODE;
        $this->message = self::MESSAGE_ERROR;
        $this->data = '';
    }

    public function getStatusCode(){
        return $this->statusCode;
    }

    public function setStatusCode($statusCode){
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message): void {
        $this->message = $message;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data): void {
        $this->data = $data;
    }

}