<?php 
	
class Forms
{
	public static function putOrderInDataBase($date , $time , $workplace = '' , $car , $name , $telephone , $service , $price , $salary , $notice , $status){

		$db = Db::getConnection();
		$db->query("INSERT INTO orders VALUES(NULL,'$date','$time','$workplace' , '$car' , '$name' , '$telephone' , '$service' , '$price' ,'$salary','$notice','$status')");
	}

	public static function putWishInDataBase($date,$worker,$wish,$notice = '', $status = 0){
		$db = Db::getConnection();
		$db->query("INSERT INTO wishes VALUES(NULL,'$date','$worker','$wish', '$notice', '$status')");
	}
}