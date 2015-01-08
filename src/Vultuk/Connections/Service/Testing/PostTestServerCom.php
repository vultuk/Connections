<?php

    namespace Vultuk\Connections\Service\Testing;

    use Vultuk\Connections\Connector\CurlPost;
    use Vultuk\Connections\Contracts\Service;
    use Vultuk\Connections\Service\Service as isAService;

    class PostTestServerCom implements Service
    {
        use isAService;

        protected $directory;

        /**
         * Returns the required connector for this service
         *
         * @return mixed
         * @author Simon Skinner <s.skinner@clix.co.uk>
         */
        public function connector()
        {
            return new CurlPost();
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
                'hostname' => 'https://posttestserver.com/post.php',
                'directory' => $this->config->get('Testing.PostTestServerCom.directory')
            ];
        }

        /**
         * Parses the return data to return it as an array
         *
         * @param $data
         * @return mixed
         * @author Simon Skinner <s.skinner@clix.co.uk>
         */
        public function parse($data)
        {
            return $this->createResult(true, [$data], null);
        }

        public function extraSettingHandler()
        {
            $this->extraGETVariables = "dir=" . $this->directory;
            return $this;
        }

    }
