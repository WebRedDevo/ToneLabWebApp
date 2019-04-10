<?php 

include_once CORE . 'models/Forms.php';

class FormsController
{
	public function actionAdd()
	{
		require_once( ROOT . '/template/order-form.php' );

		
	    if( isset($_POST['name']) && isset($_POST['telephone']) && isset($_POST['car']) && isset($_POST['service']) && isset($_POST['price']) && isset($_POST['time']) ){

	    	$price = $_POST['price'];
		    $name = $_POST['name'];
		    $car = $_POST['car'];
		    $telephone = $_POST['telephone'];
		    $service = $_POST['service'];
		    $time = $_POST['time'];
	    	
	    	Forms::putOrderInDataBase($name,$car,$telephone,$service,$time,$price);
	    }
	    

		return true;
	}
}