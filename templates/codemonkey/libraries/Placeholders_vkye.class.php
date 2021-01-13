<?php

defined('_EXEC') or die;

class Placeholders_vkye
{
    private $buffer;
    private $format;

    public function __construct( $buffer )
    {
        $this->format = new Format();
        $this->buffer = $buffer;
    }

    public function run()
    {
        return $this->buffer;
    }
}
