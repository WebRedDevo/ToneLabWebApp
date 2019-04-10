<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--order header--page container pd-28"><a class="header--order__back flex" href="/ton/calendar">
            <svg class="icon icon-left-arrow-chevron ">
              <use xlink:href="#icon-left-arrow-chevron"></use>
            </svg><span>Заказ №<?php echo $orderItem['id']; ?></span></a></header>
    <main class="main container">
      <form class="form form--add-order pd-28 flex f-d__c">
        <label>
          <h6>Имя</h6>
          <input class="form__input" type="text" value="<?php echo $orderItem['customer']; ?>" disabled>
        </label>
        <label>
          <h6>Номер</h6>
          <input class="form__input" type="tel" value="<?php echo $orderItem['telephone']; ?>" disabled>
        </label>
        <label>
          <h6>Автомобиль</h6>
          <input class="form__input" type="text" value="<?php echo $orderItem['car']; ?>" disabled>
        </label>
        <label>
          <h6>Услуга </h6>
          <input class="form__input" type="text" value="<?php echo $orderItem['service']; ?>" disabled>
        </label>
        <label>
          <h6>Cтоимость</h6>
          <input class="form__input" type="text" value="<?php echo $orderItem['price']; ?>" disabled>
        </label>
        <label>
          <h6>Время</h6>
        </label>
        <input class="form__input" type="text" value="<?php echo $orderItem['time']; ?>" disabled>
      </form>
    </main>
    <footer class="footer container flex j-c__s-b pd-28">
      <button class="footer__button button--analytics"> 
            <svg class="icon icon-line-chart ">
              <use xlink:href="#icon-line-chart"></use>
            </svg>
      </button><a class="footer__button button--add flex j-c__c a-i__c" href="/ton/form-add">
            <svg class="icon icon-button-add ">
              <use xlink:href="#icon-button-add"></use>
            </svg></a>
      <button class="footer__button button--search">
            <svg class="icon icon-search ">
              <use xlink:href="#icon-search"></use>
            </svg>
      </button>
    </footer>
    <script src="/ton/template/js/app.min.js"></script>
  </body>
</html>