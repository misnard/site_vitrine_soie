<?php
	class Database
	{
		private $host;
		private $dbname;
		private $login;
		private $pass;
		private $bdd;

		function __construct($host="", $dbname="", $login="", $pass="")
		{
			if($this->bdd == null)
			{
				$this->host = $host;
				$this->dbname = $dbname;
				$this->login = $login;
				$this->pass = $pass;
				$this->bdd = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->login, $this->pass,  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));				
			}

			return $this->bdd;
		}

		//$bdd->prepare('SELECT * FROM plat WHERE id=:id', ["id"=>htmlspecialchars($_GET['id'])], true, PDO::FETCH_OBJ);	
		public function prepare($req, array $options = [], $fetch_action = false, $return_method = PDO::FETCH_ASSOC)
		{
			$bdd = $this->bdd;
			$req = $bdd->prepare($req);
			$req->execute($options);

			if($fetch_action)
			{
				try
				{
					$res = $req->fetchAll($return_method);					
				}
				catch(Exception $e)
				{
					$res = $req->fetch($return_method);
					return $res;
				}
				return $res;
			}

			return $req;
		}

		public function query($req, $fetch_action = false, $return_method = PDO::FETCH_ASSOC)
		{
			$bdd = $this->bdd;
			$res = $bdd->query($req);
			if($fetch_action)
			{
				$data = $res->fetch($return_method);				
				return $data;
			}
			return $res;
		}
	}
?>