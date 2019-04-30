import svgSprite from './inc/svg-sprite';
import controlCalendar from './controlCalendar'
import moveTouch from './moveTouch'
import formValidate from './formValidate'
import ajax from './ajax'
import selectedMonth from './selectedMonth'
import orderCheck from './orderCheck'
import buttonAdd from './buttonAdd'
import autoList from './autoList'
import changeViewOrderTable from './change-view-order-table'
import draggable from './draggable'
import currentTime from './currentTime'






svgSprite(window, document);

ajax();
controlCalendar();

moveTouch({
  container : document.getElementsByClassName('section--planned__wrap')[0],
  padding : 28,
  touch : true
});



moveTouch({
  container : document.getElementsByClassName('header--main__calendar')[0],
  padding : 28,
  touch : true
});

moveTouch({
  container : document.getElementsByClassName('timetable__wrap')[0],
  controlContainer: document.getElementsByClassName('section--timetable__days')[0],
  currentLeft : 28,
  touch : false
});

moveTouch({
  container : document.getElementsByClassName('timetable__tasks_wrap')[1],
  touch : true
});

selectedMonth();

formValidate();

autoList();

buttonAdd();
orderCheck();


changeViewOrderTable();
//draggable();

currentTime()
