<?php 

return array(
	'ton/orders/([0-9]+)' => 'orders/page/$1',
	'ton/calendar/([0-9]{4})-([0-9]{2})-([0-9]{2})' => 'calendar/today/$1-$2-$3',


	'ton' => 'calendar/today',

	'ton/orders' => 'orders/list',
	'ton/form-add' => 'forms/add', 
	'ton/calendar' => 'calendar/today'
	

);