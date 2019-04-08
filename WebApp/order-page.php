<?php 



      require_once 'db_connect.php';

        $conn = new mysqli($hm, $un, $pw, $db);
        mysqli_set_charset($conn, "utf8");
        if($conn -> connect_error) die('error!!! connect db');

            $query = "SELECT * FROM orders WHERE id = 1";
            $result = $conn->query($query);
            if(!$result) die('not result');

           
            $row = $result->fetch_array(MYSQLI_ASSOC);

            $car = $row['car'];
            $telephone = $row['telephone'];
            $time = $row['time'];
            $customer = $row['customer'];
            $service = $row['service'];
            $id = $row['id'];
            $price = $row['price'];
        
            $conn->close();
      ?>


<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta name="robots" content="none">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#252d3d">
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--order header--page container pd-28"><a class="header--order__back flex" href="index.php">
            <svg class="icon icon-left-arrow-chevron ">
              <use xlink:href="#icon-left-arrow-chevron"></use>
            </svg><span>Заказ №<?php echo $id; ?></span></a></header>
    <main class="main container">

      


      <form class="form form--add-order pd-28 flex f-d__c">
        <label>
          <h6>Имя</h6>
          <input class="form__input" type="text" value="<?php echo $customer; ?>" disabled>
        </label>
        <label>
          <h6>Номер</h6>
          <input class="form__input" type="tel" value="<?php echo $telephone; ?>" disabled>
        </label>
        <label>
          <h6>Автомобиль</h6>
          <input class="form__input" type="text" value="<?php echo $car; ?>" disabled>
        </label>
        <label>
          <h6>Услуга </h6>
          <input class="form__input" type="text" value="<?php echo $service; ?>" disabled>
        </label>
        <label>
          <h6>Cтоимость</h6>
          <input class="form__input" type="text" value="<?php echo $price; ?>" disabled>
        </label>
        <label>
          <h6>Время</h6>
        </label>
        <input class="form__input" type="text" value="<?php echo $time; ?>" disabled>
      </form>
    </main>
    <footer class="footer container flex j-c__s-b pd-28">
      <button class="footer__button button--analytics"> 
            <svg class="icon icon-line-chart ">
              <use xlink:href="#icon-line-chart"></use>
            </svg>
      </button><a class="footer__button button--add flex j-c__c a-i__c" href="add">
            <svg class="icon icon-button-add ">
              <use xlink:href="#icon-button-add"></use>
            </svg></a>
      <button class="footer__button button--search">
            <svg class="icon icon-search ">
              <use xlink:href="#icon-search"></use>
            </svg>
      </button>
    </footer>
    <script src="js/app.min.js"></script>
  </body>
</html>