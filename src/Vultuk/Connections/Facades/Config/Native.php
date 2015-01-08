<?php

namespace Vultuk\Connections\Facades\Config;

use Vultuk\Connections\Contracts\Config;

class Native implements Config
{
    protected $data;

    /**
     * Loads the config details from an alternate source
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function load()
    {
        // TODO: Implement load() method.
    }

    /**
     * Sets the config data
     *
     * @param array $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function set(array $data)
    {
        $this->data = $data;
    }

    /**
     * Gets a key from the config
     *
     * @param $key
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function get($key)
    {
        $keys = explode('.', $key);
        $property = array_pop($keys);

        $values = $this->data;
        foreach ($keys as $single)
        {
            $values = $values[$single];
        }

        return $values[$property];
    }
}
