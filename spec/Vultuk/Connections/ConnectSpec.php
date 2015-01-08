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
        $this->to('Testing.PostTestServerCom')
             ->setData(['Super'=>'Test', 'Woop' => 'Working'])
             ->send()
             ->shouldHaveType('Vultuk\Connections\Result');
    }
}
