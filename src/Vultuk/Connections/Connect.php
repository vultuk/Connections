<?php

    namespace Vultuk\Connections;

    class Connect
    {
        protected $provider;

        public static function to($serviceType, $provider)
        {
            $thisClass = new Static();
            $thisClass->provider = '\\Vultuk\\Connections\\Service\\'.$serviceType.'\\'.$provider;
            return new $thisClass->provider();
        }
    }
