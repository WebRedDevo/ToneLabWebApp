<?php 

class Orders
{
	public static function getOrderItemById($id)
	{
		

		$db = Db::getConnection();

		$orderItem = array();

		$result = $db->query("SELECT * FROM orders WHERE id=" . $id);

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$orderItem = $result->fetch();

		return $orderItem;
	}

	public static function updateOrderItemById($id, $status)
	{
		$db = Db::getConnection();
		$result = $db->query("UPDATE `orders` SET `status` = $status WHERE `id` = $id"); 

	}
}