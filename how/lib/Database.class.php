<?php
class Database
{
	
	var $server			=	"";
	var $user			=	"";
	var $pass			=	"";
	var $database		=	"";
	var $pre			=	"";

	##############################################

	var $record			=	array();
	var $error			=	"";
	var $errno			=	0;
	var $field_table	=	"";
	var $affected_rows	=	0;
	var $link_id		=	0;
	var $query_id		=	0;

	function Database($server, $user, $pass, $database, $pre='')
	{
		$this->server=$server;
		$this->user=$user;
		$this->pass=$pass;
		$this->database=$database;
		$this->pre=$pre;
	}
	function connect()
	{
		$this->link_id=@mysql_connect($this->server, $this->user, $this->pass);
	
		if (!$this->link_id)
		{
			$this->oops("Could not connect to the server: <strong>".$this->server."</strong>.");
		}
	
		if(!@mysql_select_db($this->database, $this->link_id))
		{
			$this->oops("Could not connect to the database: <strong>".$this->database."</strong>.");
		}
	
		$this->server='';
		$this->user='';
		$this->pass='';
		$this->database='';
	}
	function close()
	{
		if(!mysql_close())
		{
			$this->oops("Could not close connection!");
		}
	}
	function escape($string)
	{
		if(get_magic_quotes_gpc())
		
			$string=stripslashes($string);
			
		return mysql_real_escape_string($string);
	}
	function query($sql)
	{
		$this->query_id=@mysql_query($sql, $this->link_id);
	
		if(!$this->query_id)
		{
			$this->oops("<strong>MySQL päring ebaõnnestus:</strong> $sql");
		}
		
		$this->affected_rows=@mysql_affected_rows();
	
		return $this->query_id;
	}
	function fetch_array($query_id=-1)
	{
		if ($query_id!=-1)
		{
			$this->query_id=$query_id;
		}
	
		if (isset($this->query_id))
		{
			$this->record=@mysql_fetch_assoc($this->query_id);
		}
		else
		{
			$this->oops("Vale päringu ID: <strong>".$this->query_id."</strong>. Vasteid ei ole.");
		}		
		return $this->record;
	}

	function fetch_all_array($sql)
	{
		$query_id=$this->query($sql);
		$out=array();
		
		while($row=$this->fetch_array($query_id, $sql))
		{
			$out[]=$row;
		}
	
		$this->free_result($query_id);
		
		return $out;
	}

	function free_result($query_id=-1)
	{
		if ($query_id!=-1)
		{
			$this->query_id=$query_id;
		}
		
		if(!@mysql_free_result($this->query_id))
		{
			$this->oops("Answer ID: <strong>".$this->query_id."</strong> could not be freed.");
		}
	}


	function query_first($query_string)
	{
		$query_id=$this->query($query_string);
		$out=$this->fetch_array($query_id);
		$this->free_result($query_id);
		
		return $out;
	}

	function query_update($table, $data, $where='1')
	{
		$q="UPDATE `".$this->pre.$table."` SET ";
	
		foreach($data as $key=>$val)
		{
			if(strtolower($val)=='null')
			
				$q.="`$key` = NULL, ";
				
			elseif(strtolower($val)=='now()')
			
				$q.="`$key` = NOW(), ";
				
			else
			
				$q.= "`$key`='".$this->escape(utf8_decode($val))."', ";
		}
	
		$q=rtrim($q, ', ').' WHERE '.$where.';';
	
		return $this->query($q);
	}
	
	function query_delete($table, $where='1')
	{
		$q="DELETE FROM `".$this->pre.$table.'` WHERE '.$where.';';
	
		return $this->query($q);
	}

	function query_insert($table, $data)
	{
		$q="INSERT INTO `".$this->pre.$table."` ";
		
		$v='';
		$n='';
	
		foreach($data as $key=>$val)
		{
			$n.="`$key`, ";
			
			if(strtolower($val)=='null')
			
				$v.="NULL, ";
				
			elseif(strtolower($val)=='now()')
			
				$v.="NOW(), ";
				
			else
				$v.= "'".$this->escape(utf8_decode($val))."', ";
		}
	
		$q.="(".rtrim($n, ', ').") VALUES (".rtrim($v, ', ').");";
		if($this->query($q))
		{
			return mysql_insert_id();
		}
		else
		
			return false;
	}

	function oops($msg='')
	{
		if($this->link_id>0)
		{
			$this->error=mysql_error($this->link_id);
			$this->errno=mysql_errno($this->link_id);
		}
		else
		{
			$this->error=mysql_error();
			$this->errno=mysql_errno();
		}
		
		?>
		<table align="center" border="1" cellspacing="0" style="background:white;color:black;width:80%;">
		<tr>
			<th colspan=2>Database Error</th>
		</tr>
		<tr>
			<td align="right" valign="top">Message:</td>
			<td><?php echo $msg; ?></td>
		</tr>
		<?php
		
		if(strlen($this->error)>0)
		{
			echo '<tr>
				<td align="right" valign="top" nowrap>MySQL Error:</td>
				<td>'.$this->error.'</td>
			</tr>';
		}
		?>
		<tr>
			<td align="right">Date:</td>
			<td><?php echo date("l, F j, Y \a\\t g:i:s A"); ?></td>
		</tr>
		<tr>
			<td align="right">Script:</td>
			<td><a href="<?php echo @$_SERVER['REQUEST_URI']; ?>"><?php echo @$_SERVER['REQUEST_URI']; ?></a></td>
		</tr>
		<?php
		
		if(strlen(@$_SERVER['HTTP_REFERER'])>0) 
		{
			echo '<tr>
				<td align="right">Referer:</td>
				<td><a href="'.@$_SERVER['HTTP_REFERER'].'">'.@$_SERVER['HTTP_REFERER'].'</a></td>
			</tr>';
		}
		
		?>
		</table>
		<?php
	}
	

	
}

?>