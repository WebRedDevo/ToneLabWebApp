<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--order header--form container pd-28"><a class="header--order__back button--back flex" href="/calendar">
            <svg class="icon icon-left-arrow-chevron ">
              <use xlink:href="#icon-left-arrow-chevron"></use>
            </svg><span>Новый заказ</span></a></header>

    <main class="main container">
      <form class="form form--add-order send-form pd-28 flex f-d__c" name="addFormOrder">
        <label>
          <input class="form__input" type="text" placeholder="Имя" name="name">
        </label>
        <label>
          <input class="form__input" type="tel" placeholder="Номер телефона" name="telephone">
        </label>
        <label>
          <input class="form__input" type="text" placeholder="Автомобиль" name="car">
        </label>
        <label>
          <input class="form__input" type="text" placeholder="Услуга" name="service">
        </label>
        <label>
          <input class="form__input" type="number" min="0" placeholder="Cтоимость" name="price">
        </label>
        <label>
          <input class="form__input" type="number" min="0" placeholder="Зарплата" name="salary">
        </label>
        <label>
          <input class="form__input" type="date" placeholder="Дата" name="date">
        </label>
        <label>
          <input class="form__input" type="time" placeholder="Время" min="10:00" max="20:00" name="time">
        </label>
        <label>
          <input class="form__input" type="text" placeholder="Примечание"  name="notice">
        </label>
      </form>
    </main>
    <?php include 'footer.php' ?>
  </body>
</html>