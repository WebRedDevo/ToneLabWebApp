<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <main class="main container flex j-c__c a-i__c h__100vh main--login">
      <section class="section section--login flex f-d__c a-i__c">
        <h1>ToneLab Заказы</h1>
        <p>Вход для сотрудников </p>
        <form method="POST" class="form--login flex f-d__c a-i__c">
          <label class="flex a-i__c">
                <svg class="icon icon-user ">
                  <use xlink:href="#icon-user"></use>
                </svg>
            <input type="text" name="login" placeholder="Имя" required autocomplete="off">
          </label>
          <label class="flex a-i__c">
                <svg class="icon icon-password ">
                  <use xlink:href="#icon-password"></use>
                </svg>
            <input type="password" name="password" placeholder="Пароль" required autocomplete="off">
          </label>
          <button class="button--login flex">
                <svg class="icon icon-login ">
                  <use xlink:href="#icon-login"></use>
                </svg>
          </button>
        </form>
      </section>
    </main>
    <script src="/template/js/app.min.js"></script>
  </body>
</html>