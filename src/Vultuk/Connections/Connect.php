<?php

    namespace Vultuk\Connections;

    use Vultuk\Connections\Contracts\Config;
    use Vultuk\Connections\Facades\Config\Native;

    class Connect
    {
        protected $provider;

        public static function to($provider, Config $config = null)
        {
            $config = (is_null($config)) ? new Native() : $config;

            $thisClass = new static();
            $thisClass->provider = '\\Vultuk\\Connections\\Service\\'.str_replace('.', '\\', $provider);
            return new $thisClass->provider($config);
        }
    }
