<?php

    namespace Vultuk\Connections\Service\Testing;

    use Vultuk\Connections\Connector\CurlPost;
    use Vultuk\Connections\Contracts\Service;
    use Vultuk\Connections\Service\Service as isAService;

    class PostTestServerCom implements Service
    {
        use isAService;

        protected $hostname = "http://posttestserver.com/post.php?dir=BlahBlahBlah";

        public function connector()
        {
            return new CurlPost();
        }

    }
