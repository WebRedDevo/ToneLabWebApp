<?php 
	
class Forms
{
	public static function putOrderInDataBase($name,$car,$telephone,$service,$time,$price){

		$db = Db::getConnection();
		$db->query("INSERT INTO orders VALUES(NULL,'2007-07-18','$time', '$car' , '$name' , '$telephone' , '$service' , '$price' ,2323,'не пидр')");
	}
}