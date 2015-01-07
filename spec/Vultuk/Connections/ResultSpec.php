<?php

namespace spec\Vultuk\Connections;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResultSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\Connections\Result');
    }
}
