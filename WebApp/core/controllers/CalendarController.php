<?php 

include_once CORE . 'models/Calendars.php';

class CalendarController
{
	public function actionToday(){


		$ordersToday = Calendars::getTodayOrders();

		require_once(ROOT . '/template/calendar.php');
		
		print_r($ordersToday);
		return true;
	}
}