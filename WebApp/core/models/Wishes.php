<?php 

class Wishes
{
	public static function getWishes()
	{
		$db = Db::getConnection();

		if($_COOKIE['login'] === 'admin'){
			$query_worker = '';
		}else{
			$query_worker = "WHERE `worker` ='" . $_COOKIE['login'] . "'";
		}


		$result = $db->query("SELECT * FROM wishes " . $query_worker);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$wishes = array();

		$i = 0;

		while($row = $result->fetch()){

			$wishes[$i]['id'] = $row['id'];
			$wishes[$i]['worker'] = $row['worker'];
			$wishes[$i]['wish'] = $row['wish'];
			$wishes[$i]['notice'] = $row['notice'];
			$wishes[$i]['date'] = $row['date'];
			$i++;
		}

		return $wishes;
	}
}