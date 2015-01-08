<?php

    namespace Vultuk\Connections;

    class Connect
    {
        protected $provider;

        public static function to($provider)
        {
            $thisClass = new Static();
            $thisClass->provider = '\\Vultuk\\Connections\\Service\\'.str_replace('.', '\\', $provider);
            return new $thisClass->provider();
        }
    }
