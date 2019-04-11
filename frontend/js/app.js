import svgSprite from './inc/svg-sprite';
import controlCalendar from './controlCalendar'
import moveTouch from './moveTouch'
import formValidate from './formValidate'


svgSprite(window, document)
controlCalendar()

moveTouch(document.getElementsByClassName('section--planned__wrap')[0])
moveTouch(document.getElementsByClassName('header--main__calendar')[0])


formValidate()
