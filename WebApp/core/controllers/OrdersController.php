<?php 

include_once CORE . 'models/Orders.php';
include_once CORE . 'components/Db.php';

class OrdersController
{
	public function actionList()
	{
		echo 'action list';
		return true;
	}

	public function actionPage($id)
	{
		if ($id) {
			$orderItem = Orders::getOrderItemById($id);

			echo '<pre>';
			print_r($orderItem);
			echo '</pre>';
		}
		
		return true;
	}
}