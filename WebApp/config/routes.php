<?php 

return array(

	'orders/([0-9]+)' => 'orders/page/$1',
	'calendar/([0-9]{4})-([0-9]{2})-([0-9]{2})' => 'calendar/today/$1-$2-$3',

	'orders' => 'orders/list',
	'form-add' => 'forms/add', 
	'calendar' => 'calendar/today',
	
	'' => 'calendar/today'
);