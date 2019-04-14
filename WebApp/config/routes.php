<?php 

return array(

	'update/orders/([0-9]+)' => 'orders/update/$1',

	'orders/([0-9]+)' => 'orders/page/$1',
	'calendar/([0-9]{4})-([0-9]{2})-([0-9]{2})' => 'calendar/today/$1-$2-$3',

	'orders' => 'orders/list',
	'form-add' => 'forms/add', 
	'form-wish' => 'forms/wish', 
	'calendar' => 'calendar/today',
	'wish-list' => 'wish/list',
	
	'' => 'calendar/today'
);