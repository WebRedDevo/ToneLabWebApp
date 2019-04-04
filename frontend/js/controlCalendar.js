function controlCalendar(){
  const root = document;
  const body = root.body;
  const calendars = root.getElementsByClassName('article-calendar');

  for( let i = 0, max = calendars.length; i < max; i++){
    calendars[i].querySelector('.article-calendar__header').addEventListener('click', function(){

      if(body.getAttribute('calendar')){
        body.setAttribute('calendar', '')
      }else{
        body.setAttribute('calendar', 'open')
      }

      for( let i = 0, max = calendars.length; i < max; i++){
        calendars[i].classList.toggle('active')
      }

    })
  }


}

export default controlCalendar
