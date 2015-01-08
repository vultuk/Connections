<?php namespace Vultuk\Connections\Service;

use Vultuk\Connections\Contracts\Config;
use Vultuk\Connections\Facades\Config\Native;
use Vultuk\Connections\Result;

trait Service
{
    protected $connector;

    protected $data;

    protected $hostname;

    protected $username;

    protected $password;

    protected $config;

    protected $extraGETVariables = null;

    public function __construct(Config $config = null)
    {
        $this->connector = $this->connector();
        $this->config = $config;

        foreach ($this->service() as $key => $value)
        {
            $this->$key = $value;
        }

        $this->extraSettingHandler();
    }

    /**
     * Sends all stored data to the service
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function send()
    {
        return $this->parse($this->connector->connect($this->hostname)->send($this)->disconnect()->getResult());
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

    /**
     * How we handle extra settings such as Username and Password
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function extraSettingHandler()
    {
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getExtraGetVariables()
    {
        return $this->extraGETVariables;
    }

} 
