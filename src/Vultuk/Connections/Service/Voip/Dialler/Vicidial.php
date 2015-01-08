<?php

    namespace Vultuk\Connections\Service\Voip\Dialler;

    use Vultuk\Connections\Connector\CurlGet;
    use Vultuk\Connections\Contracts\Service;
    use Vultuk\Connections\Service\Service as isAService;

    class Vicidial implements Service
    {

        use isAService;

        /**
         * Parses the return data to return it as an array
         *
         * @param $data
         * @return mixed
         * @author Simon Skinner <s.skinner@clix.co.uk>
         */
        public function parse($data)
        {
            $result  = (explode(':', $data)[0] == 'SUCCESS') ? true : false;
            $message = trim(explode('|', explode(':', $data)[1])[0]);

            return $this->createResult(
                $result,
                ($result) ? $message : null,
                (!$result) ? $message : null
            );
        }

        /**
         * Returns the required connector for this service
         *
         * @return mixed
         * @author Simon Skinner <s.skinner@clix.co.uk>
         */
        public function connector()
        {
            return new CurlGet();
        }

        /**
         * Returns an array of details required for the service
         *
         * @param array $details
         * @return mixed
         * @author Simon Skinner <s.skinner@clix.co.uk>
         */
        public function service()
        {
            return [
                'hostname' => $this->config->get('Voip.Dialler.Vicidial.hostname') . '/agc/api.php',
                'username' => $this->config->get('Voip.Dialler.Vicidial.username'),
                'password' => $this->config->get('Voip.Dialler.Vicidial.password'),
            ];
        }

        /**
         * How we handle extra settings such as Username and Password
         *
         * @return mixed
         * @author Simon Skinner <s.skinner@clix.co.uk>
         */
        public function extraSettingHandler()
        {
            $this->extraGETVariables = "user=" . $this->username . "&pass=" . $this->password;
            return $this;
        }

    }
