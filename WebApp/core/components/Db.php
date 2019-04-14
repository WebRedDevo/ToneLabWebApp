<?php 

class Db
{
	public static function getConnection()
	{
		$paramsPath = ROOT . '/config/db_connect.php';
		$params = include($paramsPath);

		$db = new PDO(
			"mysql:host={$params['host']};dbname={$params['dbname']}", 
			$params['user'], 
			$params['password'], 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
		);

		return $db;
	}
}