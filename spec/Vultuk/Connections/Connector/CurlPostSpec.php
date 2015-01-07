<?php

namespace spec\Vultuk\Connections\Connector;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CurlPostSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\Connections\Connector\CurlPost');
    }
}
