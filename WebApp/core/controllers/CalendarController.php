<?php 

include_once CORE . 'models/Calendars.php';

class CalendarController
{
	public function actionToday($date = '')
	{	
		if($_COOKIE['workplace'] == 'admin'){
			$workplace = '';
		}else{
			$workplace = $_COOKIE['workplace'];
		}
		
		if($date){
			$day = $date;
		}else{
			$day = date('Y', time()) . '-' . date('m', time()) . '-' . date('d', time());
		}

		$ordersToday = Calendars::getTodayOrders($day,$workplace);

		$completedOrderYear = Calendars::getCompletedOrderYear();
		$completedOrderMonth = Calendars::getCompletedOrderMonth();

		$year = Calendar::getCurrentDate('year');

		require_once(ROOT . '/template/calendar.php');
		return true;
	}
}