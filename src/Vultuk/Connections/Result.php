<?php

namespace Vultuk\Connections;

/**
 * Class Result
 * @package Vultuk\Connections
 * @author Simon Skinner <s.skinner@clix.co.uk>
 * @since ${DATE}
 */
class Result
{

    /**
     * @var
     */
    protected $result;

    /**
     * @var
     */
    protected $data;

    /**
     * @var
     */
    protected $errorMessage;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }


}
