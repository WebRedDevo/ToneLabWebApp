<?php 

class Calendars
{
	public static function getCompletedOrder()
	{
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM orders WHERE date LIKE '%2019%'");
		$count = $result->rowCount();
		return $count;
	}

	public static function getTodayOrders($date){

		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM orders WHERE date='" . $date . "'");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$ordersToday = array();

		$i = 0;

		while($row = $result->fetch()){

			$ordersToday[$i]['id'] = $row['id'];
			$ordersToday[$i]['car'] = $row['car'];
			$ordersToday[$i]['date'] = $row['date'];
			$ordersToday[$i]['time'] = $row['time'];
			$ordersToday[$i]['service'] = $row['service'];

			$i++;
		}

		return $ordersToday;
	}
}