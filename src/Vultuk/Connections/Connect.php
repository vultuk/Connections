<?php

    namespace Vultuk\Connections;

    class Connect
    {
        protected $provider;

        public function to($serviceType, $provider)
        {
            $this->provider = '\\Vultuk\\Connections\\Service\\'.$serviceType.'\\'.$provider;
            return new $this->provider();
        }
    }
