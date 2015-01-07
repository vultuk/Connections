<?php

namespace Vultuk\Connections\Service\LeadGeneration;

use Vultuk\Connections\Connector\CurlPost;
use Vultuk\Connections\Contracts\Service;
use Vultuk\Connections\Result;
use Vultuk\Connections\Service\Service as isAService;

class WhiteLabelComparison implements Service
{
    use isAService;

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
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function service()
    {
        return [
            'hostname' => 'http://www.whitelabelcomparison.com/api/',
        ];
    }

    /**
     * Parses the return data to return it as an array
     *
     * @param $data
     * @return \Vultuk\Connections\Result
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function parse($data)
    {
        $results = json_decode($data, true);

        return $this->createResult(
            ($results['success'])  ? true : false,
            ($results['success'])  ? $results['data']['data'] : null,
            (!$results['success']) ? $results['errormsg'] : null
        );
    }

}
