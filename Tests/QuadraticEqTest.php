<?php

include 'core/EquationInterface.php';
include 'core/LogInterface.php';
include 'core/LogAbstract.php';
include 'stolyarov/StolyarovException.php';
include 'stolyarov/LinearEq.php';
include 'stolyarov/QuadraticEq.php';
include 'stolyarov/Log.php';

use stolyarov\QuadraticEq;
use PHPUnit\Framework\TestCase;
use stolyarov\StolyarovException;

class QuadraticEqTest extends TestCase
{
    protected $quad;

    protected function setUp(): void
    {
        $this->quad=new QuadraticEq();
    }
    protected function tearDown(): void
    {
        $this->quad=NULL;
    }

    /*
     * Без исключений
     */
    public function testSolve1()
    {
        $this->assertEquals([2,-12],$this->quad->solve(1,10,-24));
    }
    public function testSolve2()
    {
        $this->assertEquals([-1,-2],$this->quad->solve(1,3,2));
    }
    /*
     * Крайние случаи
     */
    public function testSolve3()
    {
        $this->assertEquals(-0.5,$this->quad->solve(0,2,1));
    }
    public function testSolve4()
    {
        $this->assertEquals(0,$this->quad->solve(2,0,0));
    }
    /*
     * Исключения
     */
    public function testSolve5()
    {
        $this->expectException(StolyarovException::class);
        $this->quad->solve(0,0,0);
    }
    public function testSolve6()
    {
        $this->expectException(StolyarovException::class);
        $this->quad->solve(6,2,5);
    }
}
