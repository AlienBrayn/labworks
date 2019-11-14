<?php

	/**
	 * 
	 */
	class B 
	{
	}

	/**
	 * 
	 */
	class A extends B
	{
		public $a1;
        public $a2;

		function __construct($a,$b)
		{
			$this->a1 = $a;
			$this->a2 = $b;
		}
	}

	$b1=new B();
	$b2=new B();
	$b3=new B();

	$a2=new A($b2,$b3);
	$a1=new A($b1,$a2);
?>