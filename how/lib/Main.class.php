<?php
class Main extends Database
{
	var $config;
	
	function Main($config)
	{
		$this->config=$config;
		$this->Database(
			$this->config->mysql->host,
			$this->config->mysql->username,
			$this->config->mysql->password,
			$this->config->mysql->database,
			$this->config->mysql->perfix
		);
		$this->connect();
	}
	
	// saa IP
	function getIP()
    {
		if(isset($_SERVER["HTTP_CLIENT_IP"]))
        {
			return $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif(isset($_SERVER["HTTP_X_FORWARDED"]))
        {
			return $_SERVER["HTTP_X_FORWARDED"];
		}
		elseif(isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
			return $_SERVER["HTTP_FORWARDED_FOR"];
		}
		elseif(isset($_SERVER["HTTP_FORWARDED"]))
        {
			return $_SERVER["HTTP_FORWARDED"];
		}
		else
        {
			return $_SERVER["REMOTE_ADDR"];
		}
	}
	
	// Teisendame TIMESTAMP aja epoch ajaks
	function convDate($timestamp, $type=false)
	{
		preg_match("/(.*)-(.*)-(.*) (.*):(.*):(.*)/", $timestamp, $dateItems);
		
		if($type=='date')
		{
			$newDate=$dateItems[3].'.'.$dateItems[2].'.'.$dateItems[1];
		}
		else if($type=='time')
		{
			$newDate=$dateItems[4].':'.$dateItems[5].':'.$dateItems[6];
		}
		else if($type=='datetime')
		{
			$newDate=$dateItems[3].'.'.$dateItems[2].'.'.$dateItems[1].' '.$dateItems[4].':'.$dateItems[5].':'.$dateItems[6];
		}
		else
		{
			$newDate=mktime($dateItems[4], $dateItems[5], $dateItems[6], $dateItems[2], $dateItems[3], $dateItems[1]);
		}

		return $newDate;
	}
}
?>