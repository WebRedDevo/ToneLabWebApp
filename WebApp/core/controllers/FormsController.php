<?php 

include_once CORE . 'models/Forms.php';

class FormsController
{
	public function actionAdd()
	{
		$formName = '';
		require_once( ROOT . '/template/order-form.php' );
		
	    if( isset($_POST['car']) && isset($_POST['service']) && isset($_POST['price']) && isset($_POST['time']) ){

	    	if(isset($_POST['name']) && isset($_POST['telephone']) && isset($_POST['notice'])){
	    		$name = $_POST['name'];
	    		$notice = $_POST['notice'];
	    		$telephone = $_POST['telephone'];
	    	}else{
	    		$name = '';
	    		$notice = '';
	    		$telephone = '';
	    	}

	    	$price = $_POST['price'];
		    $car = $_POST['car'];   
		    $service = $_POST['service'];
		    $time = $_POST['time'];
		    $date = $_POST['date'];
		    $salary = $_POST['salary'];		    
		    $status = 0;

		    if(isset($_POST['workplace'])){
		    	$workplace = $_POST['workplace'];	
		    }else{
		    	$workplace = $_COOKIE['workplace'];	
		    }		    
		    	    
	    
	    	Forms::putOrderInDataBase($date, $time , $workplace, $car , $name , $telephone , $service , $price , $salary , $notice , $status);
	    }
	    
		return true;
	}


	public function actionWish()
	{	
		$formName = 'wish';

		require_once( ROOT . '/template/order-form.php' );
		
		if( isset($_POST['wish']) ){

	    	$wish = $_POST['wish'];
	    	$worker = $_COOKIE['login'];
	    	$date = date('Y', time()) . '-' . date('m', time()) . '-' . date('d', time());
	    	echo $date;
	    	Forms::putWishInDataBase($date,$worker,$wish);
	    }
	    
		return true;
	}
}