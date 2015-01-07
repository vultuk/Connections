<?php

namespace Vultuk\Connections\Connector;

use Vultuk\Connections\Contracts\Connector;

class CurlPost implements Connector
{

    protected $connection;

    protected $hostname;

    protected $result;

    /**
     * Connect to the service with the supplied details
     *
     * @param $hostname
     * @param null $username
     * @param null $password
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function connect($hostname, $username = null, $password = null)
    {
        $this->hostname = $hostname;
        $this->connection = curl_init();
        return $this;
    }

    /**
     * Send the required details to the service
     *
     * @param array $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function send(array $data)
    {
        curl_setopt($this->connection, CURLOPT_URL, $this->hostname);
        curl_setopt($this->connection, CURLOPT_POST, count($data));
        curl_setopt($this->connection, CURLOPT_POSTFIELDS, $data);
        curl_setopt($this->connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->connection, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->connection, CURLOPT_SSL_VERIFYPEER, 0);

        //execute post
        $this->result = curl_exec($this->connection);

        return $this;
    }

    /**
     * Disconnect from the service
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function disconnect()
    {
        curl_close($this->connection);
        return $this;
    }

    /**
     * Returns the response from the previous service request
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function getResult()
    {
        return $this->result;
    }
}
