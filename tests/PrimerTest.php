<?php
namespace src;
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

class PrimerTest extends TestCase
{

    public function testresultIsTrue()
    {
        $this->assertEquals(2, 2);
    }

    public function testresultIsFalse()
    {
        $this->assertNotEquals(5, 2);
    }
}
