<?php 

include_once CORE . 'models/Orders.php';


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
			require_once( ROOT . '/template/order-page.php');
		}
		
		return true;
	}
	public function actionUpdate($id)
	{
		if ($id && isset($_POST['status'])) {
			$status = $_POST['status'];
			$orderItem = Orders::updateOrderItemById($id,$status);	
		}
		
		return true;
	}
}