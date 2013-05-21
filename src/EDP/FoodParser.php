<?php

namespace EDP;

class FoodParser
{
    public function parse(Message $message)
    {
        return explode("\n", $message->getMenu());
    }
}
