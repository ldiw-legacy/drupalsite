<?php
class Config
{
	var $mysql;
	var $tab;
	var $fb;
	var $admins;
	
	function Config()
	{
		$this->mysql->host			 =	'localhost';
		$this->mysql->username		 =	'how_user';
		$this->mysql->password		 =	'AP8APDHgXe7noo';
		$this->mysql->database		 =	'how';
		$this->mysql->table			 =	'letsdoit_entries';
		$this->mysql->table_votes	 =	'letsdoit_votes';
		$this->mysql->table_comments =	'letsdoit_comments';
		$this->fb->id 				 =	'463563057013270';
		$this->fb->secret 			 =	'405541dee78729442d97edd94a053975';
		$this->fb->tab 				 =	'https://www.facebook.com/letsdoitworld/app_463563057013270';
		$this->fb->canvas 			 =	'https://www.letsdoitworld.org/how/';
		$this->fb->image 			 =	'https://www.letsdoitworld.org/how/gfx/bg-header.png';
		$this->admins				 =  array(100000848116828, 100001008023146, 1341106718, 784334535);
	}
	
}
?>