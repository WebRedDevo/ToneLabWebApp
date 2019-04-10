<?php 

class Calendars
{
	public static function getTodayOrders(){

		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM orders WHERE date='2007-07-18'");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		
		$ordersToday = array();

		$i = 0;

		while($row = $result->fetch()){

			$ordersToday[$i]['id'] = $row['id'];
			$ordersToday[$i]['customer'] = $row['customer'];
			$ordersToday[$i]['date'] = $row['date'];
			$ordersToday[$i]['time'] = $row['time'];
			$ordersToday[$i]['service'] = $row['service'];

			$i++;
		}

		return $ordersToday;
	}
}