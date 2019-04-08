<?php 




  if($_SERVER['REQUEST_URI'] === '/ton/1'){

    include_once 'order-page.php';

  }elseif($_SERVER['REQUEST_URI'] === '/ton/add'){

    include_once 'order-form.php';

  }else{

    include_once 'main.php';

  }

          
