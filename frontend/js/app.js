import svgSprite from './inc/svg-sprite';
import controlCalendar from './controlCalendar'
import moveTouch from './moveTouch'
import formValidate from './formValidate'
import ajax from './ajax'
import selectedMonth from './selectedMonth'
import orderCheck from './orderCheck'
import buttonAdd from './buttonAdd'
import autoList from './autoList'


if (!("path" in Event.prototype))
Object.defineProperty(Event.prototype, "path", {
  get: function() {
    var path = [];
    var currentElem = this.target;
    while (currentElem) {
      path.push(currentElem);
      currentElem = currentElem.parentElement;
    }
    if (path.indexOf(window) === -1 && path.indexOf(document) === -1)
      path.push(document);
    if (path.indexOf(window) === -1)
      path.push(window);
    return path;
  }
});


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
