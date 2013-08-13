<?php
class logerrors
{
	public static function writelog($fn,$filename,$content)
	{
		$file = date("Ymd").'_errors.txt';
		$current = "Caught exception in fn $fn in $filename on ".date("Y-m-d H:i:s").": $content\n";
		file_put_contents($file, $current, FILE_APPEND | LOCK_EX);
	}
}
?>
