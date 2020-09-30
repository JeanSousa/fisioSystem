<?php

namespace App\Services\ServiceResponse;

class ServiceResponse
{

    /**
     * @var bool
     */
    public $success;

    /**
     * @var string
     */
    public $message;

    /**
     * @var mixed
     */
    public $data;

    /**
     * @param bool        $success
     * @param string|null $message
     * @param mixed       $data
     */
    public function __construct(
      bool $success,
      string $message,
      $data = null
    )  {
     
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;

    }

}