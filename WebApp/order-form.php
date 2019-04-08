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
    <header class="header--order header--form container pd-28"><a class="header--order__back flex" href="index.php">
            <svg class="icon icon-left-arrow-chevron ">
              <use xlink:href="#icon-left-arrow-chevron"></use>
            </svg><span>Новый заказ</span></a></header>

    <main class="main container">
      <form class="form form--add-order send-form pd-28 flex f-d__c" name="addFormOrder">
        <label>
          <input class="form__input" type="text" placeholder="Имя" name="name">
        </label>
        <label>
          <input class="form__input" type="tel" placeholder="Номер" name="telephone">
        </label>
        <label>
          <input class="form__input" type="text" placeholder="Автомобиль" name="car">
        </label>
        <label>
          <input class="form__input" type="text" placeholder="Услуга" name="service">
        </label>
        <label>
          <input class="form__input" type="text" placeholder="Cтоимость" name="price">
        </label>
        <label>
          <input class="form__input" type="text" placeholder="Время" name="time">
        </label>
      </form>

      <?php 
        require_once 'db_operations.php';


        //putDataDB('INSERT INTO orders VALUES(NULL,"2007-07-18","15:30:00","BMW 5","Евгений смиренников",454546657, "починили заддд",2323,2323,"не пидр")');

        //getDataDB("SELECT * FROM orders ");

        if(isset($_POST['name']) && isset($_POST['telephone']) && isset($_POST['car']) && isset($_POST['service']) && isset($_POST['price']) && isset($_POST['time'])){
      

         $price = $_POST['price'];
         $name = $_POST['name'];
         $car = $_POST['car'];
         $telephone = $_POST['telephone'];
         $service = $_POST['service'];
         $time = $_POST['time'];


       
         putDataDB("INSERT INTO orders VALUES(NULL,'2007-07-18','$time', '$car' , '$name' , '$telephone' , '$service' , '$price' ,2323,'не пидр')");
        }
        
      ?>
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