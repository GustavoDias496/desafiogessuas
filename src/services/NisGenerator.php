<?php

namespace Gustavodias\Desafiogesuas\services;

class NisGenerator
{
    public static function generate(): string
    {
        return str_pad(strval(random_int(1, 99999999999)), 11, '0', STR_PAD_LEFT);
    }
}