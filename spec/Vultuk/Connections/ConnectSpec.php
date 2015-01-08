<?php

namespace spec\Vultuk\Connections;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConnectSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\Connections\Connect');
    }

    function it_should_return_a_service()
    {
        $this->to('Testing.PostTestServerCom')->shouldHaveType('\Vultuk\Connections\Service\Testing\PostTestServerCom');
    }

    function it_should_post_data_to_test_provider()
    {
        $config = new \Vultuk\Connections\Facades\Config\Native();
        $config->set([
            'Testing' => [
                'PostTestServerCom' => [
                    'directory' => 'vultuk_connections_directory',
                ]
            ]
        ]);

        $this->to('Testing.PostTestServerCom', $config)
             ->setData(['Super'=>'Test', 'Woop' => 'Working'])
             ->send()
             ->shouldHaveType('Vultuk\Connections\Result');
    }
}
