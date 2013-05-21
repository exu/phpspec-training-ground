<?php

namespace spec\EDP;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FoodParserSpec extends ObjectBehavior
{
    protected $exampleMessage = "1) PIEROGI RUSKIE OKRASZONE SMAŻONYM BOCZKIEM I CEBULKĄ, SURÓWKA
2) GULASZ WIEPRZOWY Z PYZAMI ZIEMNIACZANYMI, SURÓWKA (BURACZKI)
3) FILECIKI DROBIOWE W ŚMIETANOWYM SOSIE Z SUSZONYMI POMIDORAMI, POREM I SZPARAGAMI, MAKARON, SAŁATA Z POMIDOREM I SOSEM BALSAMICZNYM
4) PULPECIKI W POMIDOROWYM SOSIE Z DODATKIEM WŁOSKICH ZIÓŁ, CZOSNKU, MARCHEWKI I GROSZKU, ZIEMNIAKI, SURÓWKA";

    function it_is_initializable()
    {
        $this->shouldHaveType('EDP\FoodParser');
    }

    function it_parse_text_input_from_message(\EDP\Message $message)
    {
        $message->getMenu()->willReturn($this->exampleMessage);

        $this->shouldThrow('\Exception')->duringParse();
        $this->shouldThrow('\Exception')->duringParse(new \stdClass);

        $this->parse($message)->shouldBeArray();
        $this->parse($message)->shouldHaveCount(4);
    }
}
