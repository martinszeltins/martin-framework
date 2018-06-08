<?php
	namespace Martin\system;
	
  /**
   * Debugger class
   * 
   * @author   Martins Zeltins <martins@melnalapa.lv>
   */
   
	class Debugger
	{
		public static $header;
		public static $body;
		public static $footer;
		
		
		public static function init()
		{
			self::$header = '<div id="debug-container" style="max-height: 100%; overflow-y: scroll; opacity: 0.85; z-index: 3; display: block; position:fixed; top: 0; left: 0; width: 100%; background-color: #313131; background-image:url(layout/images/matrixbg.jpg); color:#fff; padding: 10px 10px 2px 10px;"><div style="font-size: 12px; color: #b1b1b1; margin-bottom: 5px;">$ Debugging mode</div>';
		
			self::$footer = '<img onclick="document.getElementById(\'debug-container\').style.opacity = \'0.65\';" src="layout/images/collapse.png" style="opacity: 0.9; cursor: pointer; position: absolute; bottom: -10px; right: 30px;" />
			</div>';
			
			if (self::$body != "") {
				echo self::$header;
				echo self::$body;
				echo self::$footer;
			}
		}
		
		
		public static function printd($var1=null, $var2=null, $var3=null, $var4=null, $var5=null)
		{
			$backtrace = debug_backtrace();
			$backtrace_file = $backtrace[0]["file"];
			$backtrace_line = $backtrace[0]["line"];
			
			if (isset($var1)) {
				self::$body .= '<div style="font-size: 14px; color: #33bd4d;"><b>> #1 ' . $backtrace_file . ' on line ' . $backtrace_line . ':</b></div>
								<div style="font-size: 14px; color: #ffffff;"><pre style="color: #ffffff;">' . print_r($var1, true) . '</pre></div>
								<br />';
			}
			
			if (isset($var2)) {
				self::$body .= '<div style="font-size: 14px; color: #34A0BD;"><b>> #1 ' . $backtrace_file . ' on line ' . $backtrace_line . ':</b></div>
								<div style="font-size: 14px; color: #ffffff;"><pre style="color: #ffffff;">' . print_r($var2, true) . '</pre></div>
								<br />';
			}
			
			if (isset($var3)) {
				self::$body .= '<div style="font-size: 14px; color: #BDB87E;"><b>> #1 ' . $backtrace_file . ' on line ' . $backtrace_line . ':</b></div>
								<div style="font-size: 14px; color: #ffffff;"><pre style="color: #ffffff;">' . print_r($var3, true) . '</pre></div>
								<br />';
			}
			
			
			if (isset($var4)) {
				self::$body .= '<div style="font-size: 14px; color: #B9A4BD;"><b>> #1 ' . $backtrace_file . ' on line ' . $backtrace_line . ':</b></div>
								<div style="font-size: 14px; color: #ffffff;"><pre style="color: #ffffff;">' . print_r($var4, true) . '</pre></div>
								<br />';
			}
			
			if (isset($var5)) {
				self::$body .= '<div style="font-size: 14px; color: #BD7052;"><b>> #1 ' . $backtrace_file . ' on line ' . $backtrace_line . ':</b></div>
								<div style="font-size: 14px; color: #ffffff;"><pre style="color: #ffffff;">' . print_r($var5, true) . '</pre></div>
								<br />';
			}
			
			self::$body .= '<div style="font-size: 14px; color: #33bd4d;">- END -</div><br /><br />';
			
		}
		
		
		public static function backtrace()
		{
			$error_string = (new \Exception)->getTraceAsString();
			$error_string = str_replace("#1","<br />#1",$error_string);
			$error_string = str_replace("#2","<br />#2",$error_string);
			$error_string = str_replace("#3","<br />#3",$error_string);
			$error_string = str_replace("#4","<br />#4",$error_string);
			$error_string = str_replace("#5","<br />#5",$error_string);
			$error_string = str_replace("#6","<br />#6",$error_string);
			$error_string = str_replace("#7","<br />#7",$error_string);
			$error_string = str_replace("#8","<br />#8",$error_string);
			$error_string = str_replace("#9","<br />#9",$error_string);
			$error_string = str_replace("#10","<br />#10",$error_string);
			
			$error_string = str_replace("Debugger::backtrace()","<span style='color: #33bd4d;'>Debugger::backtrace()</span>",$error_string);
			
			self::$body .= $error_string;
			
			self::$body .= "<br /><br />";
		}
	}
?>
