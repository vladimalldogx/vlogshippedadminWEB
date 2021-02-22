<?php
	class MYDB
	{
		static $db = null;

		static $hostname = "localhost";
		static $dbname = "vlogshipped";
		static $username  = "root";
		static $password = "";

		public static function query($sql, $params=array(), $transaction)
		{
			if(!is_array($params))
				$params = array($params);

			$rows = array();
			try
			{
				$db = new PDO("mysql:host=". self::$hostname ."; dbname=". self::$dbname,  self::$username,  self::$password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$cmd = $db->prepare($sql);
				$cmd->execute($params);
				if($transaction == "SELECT")
					$rows = $cmd->fetchAll();
				else
					$rows = $db->lastInsertId();
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			$db = null;			
			return $rows;
		}
	}
?>
