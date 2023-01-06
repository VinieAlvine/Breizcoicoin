
<?php
//C'est plus propre de travailler avec des classe ça facilite le travaille et ça évite des erreurs
class Database
{	
	//Ici tu renseigne paramètres de connection a la base de donnée
	private static $dbHost = "localhost";
	private static $dbName = "bd_breizhcoincoin";
	private static $dbUsername = "root";
	private static $dbUserpassword = "";
	private static $connection = null;

	public static function connect()
	{
		if(self::$connection == null){
			try
			{
				self::$connection = new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbName, self::$dbUsername, self::$dbUserpassword);
				self::$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			   // self::$connection -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				echo "Error : {$e->getMessage()}";
			}
		}
		return self::$connection;
	}

	public static function disconnect()
	{
		self::$connection = null;
	}

	 public function query($query, $params = false){
        if($params){
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        }else{
            $req = $this->pdo->query($query);
        }
        return $req;
    }

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
}  

 ?>



