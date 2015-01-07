<?php namespace Vultuk\Connections\Service;

trait Service
{
    protected $connector;

    protected $data;

    public function __construct()
    {
        $this->connector = $this->connector();
    }

    public function send()
    {
        return $this->connector->connect($this->hostname)->send($this->data)->disconnect()->getResult();
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }
} 
