<?php 
	
class Forms
{
	public static function putOrderInDataBase($name,$car,$telephone,$service,$date,$time,$price,$salary,$notice){

		$db = Db::getConnection();
		$db->query("INSERT INTO orders VALUES(NULL,'$date','$time', '$car' , '$name' , '$telephone' , '$service' , '$price' ,'$salary','$notice')");
	}
}