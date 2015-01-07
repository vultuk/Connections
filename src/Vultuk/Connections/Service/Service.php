<?php namespace Vultuk\Connections\Service;

use Vultuk\Connections\Result;

trait Service
{
    protected $connector;

    protected $data;

    protected $hostname;

    protected $username;

    protected $password;

    public function __construct()
    {
        $this->connector = $this->connector();

        foreach ($this->service() as $key => $value)
        {
            $this->$key = $value;
        }
    }

    /**
     * Sends all stored data to the service
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function send()
    {
        return $this->parse($this->connector->connect($this->hostname)->send($this->data)->disconnect()->getResult());
    }

    /**
     * Sets the data that will be sent
     *
     * @param array $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }


    protected function createResult($result, $data, $error)
    {
        $returnResult = new Result();
        $returnResult->setResult($result);
        $returnResult->setData($data);
        $returnResult->setErrorMessage($error);
        return $returnResult;
    }

} 
