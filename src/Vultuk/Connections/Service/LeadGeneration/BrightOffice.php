<?php
namespace Vultuk\Connections\Service\LeadGeneration;

use Vultuk\Connections\Connector\CurlPost;
use Vultuk\Connections\Contracts\Service;
use Vultuk\Connections\Service\Service as isAService;

class BrightOffice implements Service{

    use isAService;

    /**
     * Parses the return data to return it as an array
     *
     * @param $data
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function parse( $data )
    {
        return $data;
    }

    /**
     * How we handle extra settings such as Username and Password
     *
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>php
     */
    public function extraSettingHandler()
    {
    }

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
            'hostname' => $this->config->get('LeadGeneration.BrightOffice.url'),
        ];
    }

    public function getExtraGetVariables()
    {
        return 'XMLApplication=' . urlencode($this->getData());

    }

    public function getData()
    {
        $strOut = 'XMLApplication=<Application><Cases><Case>';
        foreach($this->data as $field => $val) {
            $strOut .= sprintf('<%1$s>%2$s</%1$s>', $field, $val);
        }
        $strOut .= '</Case></Cases></Application>';

        return $strOut;
    }



}
