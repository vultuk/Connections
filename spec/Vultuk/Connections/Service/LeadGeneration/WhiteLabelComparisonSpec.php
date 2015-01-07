<?php

namespace spec\Vultuk\Connections\Service\LeadGeneration;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WhiteLabelComparisonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\Connections\Service\LeadGeneration\WhiteLabelComparison');
    }

    function it_should_send_to_the_comparison_site()
    {
        $this->setData(['test' => 'data']);
        $this->send()->shouldBeArray();
    }

}
