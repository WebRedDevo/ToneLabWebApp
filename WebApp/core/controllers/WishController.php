<?php 

include_once CORE . 'models/Wishes.php';

class WishController
{
	public function actionList()
	{
		$wishes = Wishes::getWishes();
		require_once( ROOT . '/template/wish-list.php' );

		return true;
	}

}