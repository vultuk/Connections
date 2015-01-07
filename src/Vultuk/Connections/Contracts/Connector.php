<?php namespace Vultuk\Connections\Contracts;

interface Connector
{

    /**
     * Connect to the service with the supplied details
     *
     * @param $hostname
     * @param null $username
     * @param null $password
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function connect($hostname, $username=null, $password=null);

    /**
     * Send the required details to the service
     *
     * @param array $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function send(array $data);

    /**
     * Disconnect from the service
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function disconnect();

    /**
     * Returns the response from the previous service request
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function getResult();
} 
