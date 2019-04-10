<?php 

class Db
{
	public static function getConnection()
	{
		$paramsPath = ROOT . '/config/db_connect.php';
		$params = include($paramsPath);

		$db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']};charset=UTF8", $params['user'], $params['password']);

		return $db;
	}
}