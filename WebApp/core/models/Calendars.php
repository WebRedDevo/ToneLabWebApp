<?php 

class Calendars
{
	public static function getCompletedOrderYear()
	{
		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM orders WHERE date LIKE '%2019%'");
		$count = $result->rowCount();
		return $count;
	}

	public static function getCompletedOrderMonth()
	{
		$db = Db::getConnection();
		$completedOrderMonth = array();
		$i = 1;
		while($i <= 12){
			$month =  date('m', mktime(0,0,0,$i, 1, 2019));
			$result = $db->query("SELECT * FROM orders WHERE date LIKE '%-" . $month . "-%'");
			$completedOrderMonth[$i-1] = $result->rowCount();
			$i++;
		}
		
		return $completedOrderMonth;
	}

	public static function getTodayOrders($date){

		$db = Db::getConnection();
		$result = $db->query("SELECT * FROM orders WHERE `date` ='" . $date . "' ORDER BY `time` ASC");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$ordersToday = array();

		$i = 0;

		while($row = $result->fetch()){

			$ordersToday[$i]['id'] = $row['id'];
			$ordersToday[$i]['car'] = $row['car'];
			$ordersToday[$i]['date'] = $row['date'];
			$ordersToday[$i]['time'] = substr($row['time'], 0, -3);
			$ordersToday[$i]['service'] = $row['service'];

			$i++;
		}

		return $ordersToday;
	}
}