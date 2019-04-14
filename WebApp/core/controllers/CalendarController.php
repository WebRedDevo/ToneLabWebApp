<?php 

include_once CORE . 'models/Calendars.php';

class CalendarController
{


	public function actionToday($date = '2007-07-18')
	{
		$ordersToday = Calendars::getTodayOrders($date);

		$completedOrderYear = Calendars::getCompletedOrderYear();
		$completedOrderMonth = Calendars::getCompletedOrderMonth();

		$year = Calendar::getCurrentDate('year');

		require_once(ROOT . '/template/calendar.php');
		return true;
	}
}