<?php

namespace Tests\Services;

use PHPUnit\Framework\TestCase;
use Gustavodias\Desafiogessuas\services\NisGenerator;

class NisGeneratorTest extends TestCase
{
    public function testNisLength(){
        $nis = NisGenerator::generate();
        $this->assertEquals(11,strlen($nis));
    }

    public function testGenerateReturnsOnlyNumbers(){
        $nis = NisGenerator::generate();
        $this->assertMatchesRegularExpression('/^\d+$/', $nis);
    }
}