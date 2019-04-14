<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--order header--form container pd-28">
      <a class="header--order__back button--back flex" href="/calendar">
            <svg class="icon icon-left-arrow-chevron ">
              <use xlink:href="#icon-left-arrow-chevron"></use>
            </svg>

            <?php 

            if($formName){
              echo "<span>Мне нужно</span>";
            }else{
              echo "<span>Новый заказ</span>";
            }
            ?>
            
          </a>
    </header>

    <main class="main container">

      <?php if($formName): ?>

        <form class="form form--add-order send-form pd-28 flex f-d__c" name="addFormOrder">
          <label>
            <input class="form__input" type="text" placeholder="Что именно" name="wish" required>
            <textarea class="form__input" placeholder="Более подробно, если требуется ..." name="notice"></textarea>
          </label>   
        </form>

      <?php else: ?>

        <form class="form form--add-order send-form pd-28 flex f-d__c" name="addFormOrder">
          <label>
            <input class="form__input" type="text" placeholder="Имя" name="name">
          </label>
          <label>
            <input class="form__input" type="tel" placeholder="Номер телефона" name="telephone" >
          </label>
          <label>
            <input class="form__input" type="text" placeholder="Автомобиль" name="car" required>
          </label>
          <label>
            <input class="form__input" type="text" placeholder="Услуга" name="service" required>
          </label>
          <label>
            <input class="form__input" type="number" min="0" placeholder="Cтоимость" name="price" required>
          </label>
          <label>
            <input class="form__input" type="number" min="0" placeholder="Зарплата" name="salary">
          </label>
          <label>
            <input class="form__input" type="date" placeholder="Дата" name="date" required>
          </label>
          <label>
            <input class="form__input" type="time" placeholder="Время" min="10:00" max="20:00" name="time" required>
          </label>

          <?php if($_COOKIE['login'] === 'admin'): ?>

         <label>
          <input class="form__input" type="text" placeholder="Адрес"  name="workplace">
         </label>

         <?php endif;?>

          <label>
            <input class="form__input" type="text" placeholder="Примечание"  name="notice">
          </label>
        </form>

      <?php endif; ?>

    </main>
    <?php include 'footer.php' ?>
  </body>
</html>