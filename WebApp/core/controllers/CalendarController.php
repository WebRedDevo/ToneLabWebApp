<?php 

include_once CORE . 'models/Calendars.php';

class CalendarController
{


	public function actionToday($date = '2007-07-18')
	{
		$ordersToday = Calendars::getTodayOrders($date);

		$completedOrder = Calendars::getCompletedOrder();

		$year = Calendar::getCurrentDate('year');

		require_once(ROOT . '/template/calendar.php');
		return true;
	}
}