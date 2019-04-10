<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--order header--form container pd-28"><a class="header--order__back flex" href="/ton/calendar">
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
    </main>
    <?php include 'footer.php' ?>
  </body>
</html>