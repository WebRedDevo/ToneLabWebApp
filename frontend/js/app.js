import svgSprite from './inc/svg-sprite';
import controlCalendar from './controlCalendar'
import moveTouch from './moveTouch'
import formValidate from './formValidate'
import ajax from './ajax'
import selectedMonth from './selectedMonth'
import orderCheck from './orderCheck'
import buttonAdd from './buttonAdd'
import autoList from './autoList'




window.onclick = function(e){
  const root = document;
  const body = root.body;
  console.log(e.target)
  root.querySelector('.section--timetable').innerHTML = e.target.getAttribute('class');
}

svgSprite(window, document);

ajax();
controlCalendar();

moveTouch(document.getElementsByClassName('section--planned__wrap')[0]);
moveTouch(document.getElementsByClassName('header--main__calendar')[0]);

selectedMonth();

formValidate();

autoList();

buttonAdd();
orderCheck();
