<?php namespace Vultuk\Connections\Service\PushNotifications;

use Vultuk\Connections\Connector\CurlPost;
use Vultuk\Connections\Contracts\Service;
use Vultuk\Connections\Service\Service as isAService;
class PushOver implements Service{

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
     * @param array $details
     * @return mixed
     * @author Simon Skinner <s.skinner@clix.co.uk>
     */
    public function service()
    {
        return [
            'hostname' => $this->config->get('PushNotifications.PushOver.url'),
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
        return json_decode($data);
    }

    public function getData()
    {
        if(!array_key_exists('token', $this->data)){
            $this->data['token'] = $this->config->get('PushNotifications.PushOver.token');
        }

        if(!array_key_exists('user', $this->data)){
            $this->data['user'] = $this->config->get('PushNotifications.PushOver.user');
        }

        return $this->data;

    }


}
