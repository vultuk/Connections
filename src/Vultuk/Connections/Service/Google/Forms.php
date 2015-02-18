<?php namespace Vultuk\Connections\Service\Google;


use Vultuk\Connections\Connector\CurlGet;
use Vultuk\Connections\Connector\CurlPost;
use Vultuk\Connections\Contracts\Config;
use Vultuk\Connections\Contracts\Service;
use Vultuk\Connections\Service\Service as isAService;

class Forms implements Service
{

    protected $connector;

    protected $config;

    use isAService {
        send as traitSend;
    }

    /**
     * Parses the return data to return it as an array
     *
     * @param $data
     * @return mixed
     */
    public function parse($data)
    {
        return $data;
    }

    /**
     * Returns the required connector for this service
     *
     * @return mixed
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
     */
    public function service()
    {
        return [
            'hostname' => $this->config->get('Google.Forms.Url'),
        ];
    }

    public function extraSettingHandler()
    {
    }

    public function send()
    {
        $result = $this->traitSend();
        if (strpos($result, 'Thanks!') === false) {
            return false;
        }
        return true;
    }


}
