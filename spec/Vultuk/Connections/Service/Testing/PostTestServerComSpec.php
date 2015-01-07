<?php

namespace spec\Vultuk\Connections\Service\Testing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Vultuk\Connections\Connector\CurlPost;
use Vultuk\Connections\Contracts\Connector;

class PostTestServerComSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\Connections\Service\Testing\PostTestServerCom');
    }

    function it_should_connect_to_the_testing_server()
    {
        $this->setData(['test' => 'data']);
        $this->send()->shouldHaveType('Vultuk\Connections\Result');
    }

}
