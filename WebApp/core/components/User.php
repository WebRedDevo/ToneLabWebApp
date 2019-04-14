<?php 

class User
{
	public static function getCheckUser()
	{

		if(isset($_POST['login']) && isset($_POST['password'])){

			$db = Db::getConnection();
			$result = $db->query("SELECT name,password,workplace FROM workers WHERE name='" .$_POST['login']. "'");
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$row = $result->fetch();

			$name = $row['name'];
			$password = $row['password'];
			$workplace = $row['workplace'];

			if($name === $_POST['login'] && $password === $_POST['password']){
				setcookie('login', $name, time() + 60 * 60 * 24 * 31, '/');
				setcookie('workplace', $workplace, time() + 60 * 60 * 24 * 31, '/');
				header("Location: " . $_SERVER['REQUEST_URI']);
			}

			
		}
	}	
}