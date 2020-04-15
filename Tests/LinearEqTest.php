<?php

if (file_exists(__DIR__."/..//vendor/autoload.php")) {
    require __DIR__."/../vendor/autoload.php";
}

use stolyarov\LinearEq;
use PHPUnit\Framework\TestCase;
use stolyarov\StolyarovException;

class LinearEqTest extends TestCase
{
    protected $linear;

    protected function setUp(): void
    {
        $this->linear=new LinearEq();
    }
    protected function tearDown(): void
    {
        $this->linear=NULL;
    }

    /*
     * Без исключений
     */
    public function testSolvel1()
    {
        $this->assertEquals(-0.5,$this->linear->solvel(2,1));
    }
    public function testSolvel2()
    {
        $this->assertEquals(-0.6,$this->linear->solvel(5,3));
    }
    /*
     * Крайние случаи
     */
    public function testSolvel3()
    {
        $this->assertEquals(0,$this->linear->solvel(5,0));
    }
    /*
     * Исключения
     */
    public function testSolvel4()
    {
        $this->expectException(StolyarovException::class);
        $this->linear->solvel(0,0);
    }
    public function testSolvel5()
    {
        $this->expectException(StolyarovException::class);
        $this->linear->solvel(0,123);
    }
}
