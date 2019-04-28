import svgSprite from './inc/svg-sprite';
import controlCalendar from './controlCalendar'
import moveTouch from './moveTouch'
import formValidate from './formValidate'
import ajax from './ajax'
import selectedMonth from './selectedMonth'
import orderCheck from './orderCheck'
import buttonAdd from './buttonAdd'
import autoList from './autoList'






svgSprite(window, document);

ajax();
controlCalendar();

moveTouch({
  container : document.getElementsByClassName('section--planned__wrap')[0],
  padding : 28,
});

moveTouch({
  container : document.getElementsByClassName('header--main__calendar')[0],
  padding : 28,
});

moveTouch({
  container : document.getElementsByClassName('timetable__wrap')[0],
  control: document.getElementsByClassName('section--timetable__days')[0],
  currentLeft : 28
});

selectedMonth();

formValidate();

autoList();

buttonAdd();
orderCheck();
