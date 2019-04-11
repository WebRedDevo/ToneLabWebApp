<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--main container">
      <div class="header--main__date flex j-c__s-b pd-28"> 
        <p class="year"><?php echo $year; ?></p>
        <p>Выполнено: <span><?php echo $completedOrder; ?></span></p>
      </div>
      <div class="header--main__calendar flex a-i__c">

        <?php 


          $masMonth = array(
            'January' => 'Январь',
            'February' => 'Февраль',
            'March' => 'Март',
            'April' => 'Апрель',
            'May' => 'Май',
            'June' => 'Июнь',
            'July' => 'Июль',
            'August' => 'Август',
            'September' => 'Сентябрь',
            'October' => 'Октябрь',
            'November' => 'Ноябрь',
            'December' => 'Декабрь',
          );

          $classCurrent = '';
          $currentDay = '';

          for($month = 1; $month <= 12; $month++ ) :

            if( $month == date('n',time()) ) {
              $classCurrent = 'current';
              $currentDay = date('j',time());
            }else{
              $classCurrent = '';
              $currentDay = '';
            }

            
          ?>

            <div class="article-calendar <?php echo $classCurrent; ?>">
              <header class="article-calendar__header flex j-c__s-b a-i__c">
                <h3> <?php echo $currentDay . ' ' . $masMonth[date('F', mktime(0,0,0, $month, 1, 2019))]; ?></h3>
                <p>7 задач</p>
              </header>
              <footer class="article-calendar__footer">
                <table>
                  <thead> 
                    <tr>
                      <th>П</th>
                      <th>В</th>
                      <th>С</th>
                      <th>Ч</th>
                      <th>П</th>
                      <th>С</th>
                      <th>В</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      $first_day_month = date('N', mktime(0,0,0,$month,1,$year));
                      $day_in_month = date('t', mktime(0,0,0,$month,1,$year));
                      $month_m = date('m', mktime(0,0,0,$month,1,$year));
                     

                      echo '<tr>';

                      $past_day = 1;

                      while($past_day < $first_day_month)
                      {
                        echo "<td></td>";
                        $past_day++;

                      }

                      for($day = 1; $day <= $day_in_month; $day++)
                      {
                        $day_week = date('N', mktime(0,0,0,$month,$day,$year));
                        $day_d = date('d', mktime(0,0,0,$month,$day,$year));

                        if($day_week != $day && $day_week == 1)
                        {
                          echo "</tr><tr>";
                        }

                        if($day < $currentDay){
                          $class = "class=\"past\"";
                        }elseif($day == $currentDay){
                          $class = "class=\"active\"";
                        }else{
                          $class = "";
                        }

                        echo "<td $class><a href=\"/ton/calendar/2019-$month_m-$day_d\">$day</a></td>";
                      }

                      if($day_week < 7)
                      {
                        $past_day = $day_week;

                        while($past_day < 7)
                        {
                          echo "<td></td>";
                          $past_day++;
                        }
                      }

                      echo '</tr>';

                    ?>

                  </tbody>
                </table>
              </footer>
            </div>

            <?php endfor;?>

      </div>
    </header>
    <main class="main container">

      <?php if($ordersToday): ?>

      <section class="section section--planned">
        <h2 class="pd-28"> Запланированно </h2>
        <div class="section--planned__articles">
          <div class="section--planned__wrap flex">

            <?php 

              foreach( $ordersToday as $orderItem ): 

                $current = $orderItem['time'] == '12:00:00' ? 'current' : '';
              
              ?>

                <article class="article-planned <?php echo $current?>">
                  <a href="<?php echo '/ton/orders/' . $orderItem['id']; ?>">
                      <header class="article-planned__header flex j-c__s-b a-i__c">
                        <span class="article-planned__time"><?php echo $orderItem['time']; ?></span>
                        <button class="article-planned__check"></button>
                      </header>
                      <h3><?php echo $orderItem['car']; ?></h3>
                      <p><?php echo $orderItem['service']; ?></p>
                   </a>
                </article>
            <?php endforeach;?>


          </div>
        </div>
      </section>
      <section class="section section--timetable pd-28"> 
        <h2>Задачи на сегодня </h2>
        <div class="section--timetable__days flex j-c__s-b">
          <?php 
          
          echo date('N',mktime(0,0,0, date('n',time()), date('j',time()), 2019));


         

          ?>

          <a href="/ton/calendar/2019-<?php echo date('m',time());?>-01" class="button--day flex j-c__c a-i__c">П</a>
          <a href="/ton/calendar/2019-<?php echo date('m',time());?>-02" class="button--day flex j-c__c a-i__c">В</a>
          <a href="/ton/calendar/2019-<?php echo date('m',time());?>-03" class="button--day flex j-c__c a-i__c">С</a>
          <a href="/ton/calendar/2019-<?php echo date('m',time());?>-04" class="button--day flex j-c__c a-i__c active">Ч</a>
          <a href="/ton/calendar/2019-<?php echo date('m',time());?>-05" class="button--day flex j-c__c a-i__c">П</a>
          <a href="/ton/calendar/2019-<?php echo date('m',time());?>-06" class="button--day flex j-c__c a-i__c">С</a>
          <a href="/ton/calendar/2019-<?php echo date('m',time());?>-07" class="button--day flex j-c__c a-i__c">В</a>
        </div>
        <ul class="timetable">
          <?php foreach( $ordersToday as $orderItem ): ?>

            <li class="timetable__item flex a-i__c">
              <p class="timetable__time"><?php echo $orderItem['time']; ?></p>
              <div class="timetable__tasks flex">
                <a href="<?php echo '/ton/orders/' . $orderItem['id']; ?>" class="button--task button--orange task--finished"> </a>
              </div>
            </li>

          <?php endforeach; ?>
          
        </ul>
      </section>

    <?php else: ?>

    <section class="section section--nothing-found flex f-d__c j-c__c a-i__c">
          <svg class="icon icon-embarrassed ">
            <use xlink:href="#icon-embarrassed"></use>
          </svg>
      <p>Заказов нет...</p>
    </section>

     <?php endif; ?>

    </main>
    <?php include 'footer.php' ?>
  </body>
</html>