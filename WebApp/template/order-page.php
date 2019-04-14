<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--order header--page container pd-28"><a class="header--order__back button--back flex" href="/calendar">
            <svg class="icon icon-left-arrow-chevron ">
              <use xlink:href="#icon-left-arrow-chevron"></use>
            </svg><span>Заказ №<?php echo $orderItem['id']; ?></span></a></header>
    <main class="main container">
      <form class="form form--add-order pd-28 flex f-d__c">

        <?php if($orderItem['customer'] !== ''): ?>
        <label>
          <h6>Имя</h6>
          <input class="form__input" type="text" value="<?php echo $orderItem['customer']; ?>" disabled>
        </label>
        <?php endif;?>

        <?php if($orderItem['telephone'] !== ''): ?>
        <label>
          <h6>Номер телефона</h6>
          <input class="form__input" type="tel" value="<?php echo $orderItem['telephone']; ?>" disabled>
        </label>
        <?php endif;?>

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
        <input class="form__input" type="text" value="<?php echo substr($orderItem['time'], 0, -3); ?>" disabled>
      </form>
    </main>
   <?php include 'footer.php' ?>
  </body>
</html>