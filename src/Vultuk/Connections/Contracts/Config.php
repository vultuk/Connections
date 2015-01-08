<?php namespace Vultuk\Connections\Contracts;

interface Config {

    /**
     * Loads the config details from an alternate source
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function load();

    /**
     * Sets the config data
     *
     * @param array $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function set(array $data);

    /**
     * Gets a key from the config
     *
     * @param $key
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function get($key);

} 
