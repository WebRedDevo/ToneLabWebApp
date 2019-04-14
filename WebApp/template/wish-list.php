<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header header--order header--wish container pd-28"><a class="header--order__back button--back flex" href="/calendar">
            <svg class="icon icon-left-arrow-chevron ">
              <use xlink:href="#icon-left-arrow-chevron"></use>
            </svg><span>Мне нужно</span></a>
          </header>
    <main class="main container main--wish-list">
      <section class="section section--planned pd-28">

          <?php foreach($wishes as $wishItem): ?>
          <div class="section--planned__articles">
              <article class="article-planned"><a href="">
                  <header class="article-planned__header flex j-c__s-b a-i__c">
                    <span class="article-planned__time">
                      <?php 

                      echo $wishItem['date'];
                      if($_COOKIE['login'] === 'admin'){
                        echo ', ' . $wishItem['worker'];
                      }

                      ?>
                        
                      </span>
                    <button class="article-planned__check"></button>
                  </header>
                  <h3><?php echo $wishItem['wish']?></h3>
                  

                </a>
              </article>
          <?php endforeach; ?>
              
        </div>
      </section>
    </main>
    <?php include 'footer.php' ?>
  </body>
</html>