<?php namespace Vultuk\Connections\Contracts;

/**
 * Interface Service
 * @package Vultuk\Connections\Contracts
 * @author Simon Skinner <s.skinner@clix.co.uk>
 */
interface Service
{

    /**
     * Parses the return data to return it as an array
     *
     * @param $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function parse($data);

    /**
     * Returns the required connector for this service
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function connector();

    /**
     * How we handle extra settings such as Username and Password
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function extraSettingHandler();

    /**
     * Returns an array of details required for the service
     *
     * @param array $details
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function service();

    /**
     * Sends all stored data to the service
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function send();

    /**
     * Sets the data that will be sent
     *
     * @param array $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function setData(array $data);

    public function getData();

    public function getExtraGetVariables();
} 
