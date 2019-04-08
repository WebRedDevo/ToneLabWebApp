<?php 
	

        function putDataDB($query){

        	require 'db_connect.php';

		    $conn = new mysqli($hm, $un, $pw, $db);
		    mysqli_set_charset($conn, "utf8");
		    if($conn -> connect_error) die('error!!! connect db');


            $result = $conn->query($query);
            if(!$result) die('not result');

           
            $conn->close();

          }


          function getDataDB($query){

          	require 'db_connect.php';

		    $conn = new mysqli($hm, $un, $pw, $db);
		    mysqli_set_charset($conn, "utf8");
		    if($conn -> connect_error) die('error!!! connect db');



            $result = $conn->query($query);
            if(!$result) die('not result');

            $rows = $result -> num_rows;

            for($j = 0; $j < $rows; $j++ ){
              $result->data_seek($j);
              $row = $result->fetch_array(MYSQLI_ASSOC);

              $car = $row['car'];
              $telephone = $row['telephone'];
              $time = $row['time'];
              $customer = $row['customer'];
              $service = $row['service'];
              $id = $row['id'];

              echo <<<_HERDOC1
              <article class="article-planned">
              	<a href="$id">
                    <header class="article-planned__header flex j-c__s-b a-i__c">
                    	<span class="article-planned__time">$time</span>
                      <button class="article-planned__check"></button>
                    </header>
                    <h3> $customer</h3>
                    <p>$service</p>
                 </a>
              </article>

              _HERDOC1;

            }


            $result->close();
            $conn->close();

          }