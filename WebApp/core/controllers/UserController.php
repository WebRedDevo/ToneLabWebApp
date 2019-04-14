<?php 

class UserController
{
	public function actionLogin()
	{
		require_once( ROOT . '/template/login.php' );

		return true;
	}

}