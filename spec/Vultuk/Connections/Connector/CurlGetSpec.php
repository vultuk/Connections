<?php

namespace spec\Vultuk\Connections\Connector;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CurlGetSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\Connections\Connector\CurlGet');
    }
}
