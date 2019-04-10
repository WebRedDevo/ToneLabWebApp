<!DOCTYPE html>
<html lang="ru">
  <head>
    <?php include 'head.php'; ?>
    <title>ToneLabWebApp</title>
  </head>
  <body>
    <header class="header--main container">
      <div class="header--main__date flex j-c__s-b pd-28"> 
        <p class="year">2019</p>
        <p>Выполнено: <span>78</span></p>
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

                    <tr>
                    <?php 
                      $day_month = 1;
                      $delta = date('N', mktime(0,0,0, $month, 1 , 2019)) - 1;

                      for($j = 1; $j <= 7; $j++){

                        if( $j >= date('N', mktime(0,0,0, $month, 1 , 2019))){
                          echo "<td>". $day_month++ ."</td>";
                          
                        }else{
                          echo "<td class='past'>". date('j', mktime(0,0,0, $month, -$delta + $j, 2019)) ."</td>";
                        }

                      }

                    ?>

                  </tr>

                  <tr>
                    <?php 
                      for($j = $day_month, $max_j = $day_month + 6; $j <= $max_j; $j++){
                        if($currentDay == $day_month){
                          echo "<td class='active'><span>". $day_month++ ."</span></td>";
                        }else{
                          echo "<td>". $day_month++ ."</td>";
                        }
                      
  
                      }

                    ?>
                  </tr> 

                  <tr>
                    <?php 
                      for($j = $day_month, $max_j = $day_month + 6; $j <= $max_j; $j++){
                       if($currentDay == $day_month){
                          echo "<td class='active'><span>". $day_month++ ."</span></td>";
                        }else{
                          echo "<td >". $day_month++ ."</td>";
                        }
  
                      }

                    ?>
                  </tr> 

                  <tr>
                    <?php 
                      for($j = $day_month, $max_j = $day_month + 6; $j <= $max_j; $j++){
                       echo "<td>". date('j', mktime(0,0,0, $month, $day_month++ , 2019)) ."</td>";
  
                      }

                    ?>
                  </tr> 
                  <tr>
                    <?php 
                      for($j = $day_month, $max_j = $day_month + 6; $j <= $max_j; $j++){

                        if($j == date('j', mktime(0,0,0, $month, $j , 2019))){
                          echo "<td>". date('j', mktime(0,0,0, $month, $day_month++ , 2019))  ."</td>";
                        }else{
                          echo "<td class='past'>". date('j', mktime(0,0,0, $month, $day_month++ , 2019)) ."</td>";
                        }
                       
  
                      }

                    ?>
                  </tr>

                 
                    
                   
                   
          
                    


                  </tbody>
                </table>
              </footer>
            </div>

            <?php endfor;?>

      </div>
    </header>
    <main class="main container">
      <section class="section section--planned">
        <h2 class="pd-28"> Запланированно </h2>
        <div class="section--planned__articles">
          <div class="section--planned__wrap flex">

            <?php foreach( $ordersToday as $orderItem ): ?>



              <article class="article-planned">
                <a href="<?php echo '/ton/orders/' . $orderItem['id']; ?>">
                    <header class="article-planned__header flex j-c__s-b a-i__c">
                      <span class="article-planned__time"><?php echo $orderItem['time']; ?></span>
                      <button class="article-planned__check"></button>
                    </header>
                    <h3><?php echo $orderItem['customer']; ?></h3>
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
          <button class="button--day flex j-c__c a-i__c">П</button>
          <button class="button--day flex j-c__c a-i__c">В</button>
          <button class="button--day flex j-c__c a-i__c">С</button>
          <button class="button--day flex j-c__c a-i__c active">Ч</button>
          <button class="button--day flex j-c__c a-i__c">П</button>
          <button class="button--day flex j-c__c a-i__c">С</button>
          <button class="button--day flex j-c__c a-i__c">В</button>
        </div>
        <ul class="timetable">
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">10:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--orange task--finished"> </button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">11:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--green task--finished"> </button>
              <button class="button--task button--green task--finished"> </button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">13:00</p>
            <div class="timetable__tasks flex"></div>
          </li>
          <li class="timetable__item flex a-i__c active">
            <p class="timetable__time">14:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--orange"> </button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">15:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--orange"> </button>
              <button class="button--task button--green"> </button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">16:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--green"> </button>
              <button class="button--task button--orange"> </button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">17:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--orange"> </button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">18:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--orange"> </button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">19:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--green"></button>
            </div>
          </li>
          <li class="timetable__item flex a-i__c">
            <p class="timetable__time">20:00</p>
            <div class="timetable__tasks flex">
              <button class="button--task button--orange"> </button>
            </div>
          </li>
        </ul>
      </section>
    </main>
    <?php include 'footer.php' ?>
  </body>
</html>