<?php
	namespace stolyarov;
	/**
	 * 
	 */
	use core;
	class Log extends core\LogAbstract implements core\LogInterface
	{
		public static function log($str)
        {
            $file=fopen("Log/log.txt",'a');
            $write=fwrite($file,date(DATE_COOKIE)." | ".$str."\r\n");
            fclose($file);
            if ($write) self::Instance()->log[]=$str;
            else throw new StolyarovException("Error adding message");
		}
   		public static function write(){
            self::Instance()->_write();
   		}
   		public function _write(){
            foreach (self::Instance()->log as $value)
            {
                echo $value;
                echo "\n";
            }
   		}
	}