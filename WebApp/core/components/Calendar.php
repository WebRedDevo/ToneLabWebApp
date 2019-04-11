<?php 

class Calendar
{
	public static function getCurrentDate($date)
	{
		if($date == 'year'){
			$date = date('Y',time());
		}elseif($date == 'month'){
			$date = date('Y',time());
		}

		return $date;
	}
	
}